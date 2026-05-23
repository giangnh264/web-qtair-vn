if (typeof (window.cassiopeia_tagifies) == 'undefined') {
    window.cassiopeia_tagifies = {};
}
(function ($) {
    Drupal.behaviors.cassiopeia_ticket_issue_form = {
        attach: function (context, settings) {
            $('.cassiopeia-ticket-issue-form', context).once('cassiopeia-ticket-issue-form',function () {
                $(".ticket-review table").addClass("table");
                $(".ticket-review table").wrap('<div class="table-responsive"></div>');
                var typingTimer;
                function formatNumber(n) {
                    // format number 1000000 to 1,234,567
                    return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ".")
                }
                $("input.currency_format").keyup(function(e){
                    var _this = $(this);
                    var Price = _this.val();
                    Price = Price.replace(".", "");
                    _this.val(formatNumber(Price));
                });
                let _page = $("input[name='page']");
                let str = "<div class=\"loading-block active\">\n" +
                    "    <div class=\"loading-block-container\">\n" +
                    "        <div class=\"lds-css ng-scope\">\n" +
                    "            <div class=\"lds-spin\" style=\"width:100%;height:100%\"><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div></div>\n" +
                    "        </div>\n" +
                    "    </div>\n" +
                    "</div>";
                $.fn.cassiopeiaAlert = function (data) {
                    $(".cassiopeia-ticket-issue-form .loading-block").remove();
                    let _html = "<ul class='pd-0 mg-0'>";
                    jQuery.each(JSON.parse(data), function( index, value ) {
                        _html+="<li>"+value+"</li>";
                    });
                    _html+="</ul>";
                    $.dialog({
                        title: null,
                        content: _html
                    });
                };
                $(".btn-pre-issue").click(function (e) {
                    e.stopPropagation();
                    let a = $.confirm({
                        title: '',
                        content: 'Bạn có muốn xuất vé không?',
                        buttons: {
                            formSubmit: {
                                text: 'Xuất vé',
                                btnClass: 'btn-success',
                                action: function () {
                                    $(".cassiopeia-ticket-issue-form").append(str);
                                    $(".btn-issue").trigger("mousedown");
                                }
                            },
                            cancel: {
                                text: 'Hủy',
                                btnClass: 'btn-default',
                                action: function () {
                                    a.close();
                                }
                            },
                        }
                    });
                });
                $.fn.cassiopeiaTicketIssueCompleted = function (data) {
                    $(".cassiopeia-ticket-issue-form .loading-block").remove();
                    let a = $.confirm({
                        title: 'Xuất vé thành công!',
                        content: 'Bạn có muốn mở lại mặt vé không?',
                        buttons: {
                            formSubmit: {
                                text: 'Xác nhận',
                                btnClass: 'btn-success',
                                action: function () {
                                    $(".btn-open-pnr").trigger("mousedown");
                                }
                            },
                            cancel: {
                                text: 'Hủy',
                                btnClass: 'btn-default',
                                action: function () {
                                    a.close();
                                }
                            },
                        }
                    });
                };
                Drupal.ajax[$('.btn-ajax').attr("id")].options.beforeSubmit = function(){
                    $(".cassiopeia-ticket-issue-form").append(str);
                };
                $(".ajax-item").click(function (e) {
                    let page = $(this).attr("data-page");
                    _page.val(page);
                    _page.trigger("blur");
                });
                $("input[name='tagify-issue-agent']").each(function( index, element ) {
                    let _application_country_controller_; // for aborting the call
                    let _application_country_whitelist_ = $('input[name="issue-group[agent]"]').val()? JSON.parse($('input[name="issue-group[agent]"]').val()):[];
                    cassiopeia_tagifies['tagify_issue_agent'] = $(element).tagify({
                        whitelist: _application_country_whitelist_,
                        maxTags: 1,
                        enforceWhitelist : true,
                        editTags: 0,
                        pasteAsTags: false,
                        dropdown: {
                            maxItems: 300,
                            classname: "tags-look",
                            enabled: 1,
                            closeOnSelect: true,
                            searchKeys: ["code", "name"],
                        },
                        templates : {
                            tag : function(tagData){
                                try{
                                    return `<tag title='${tagData.name} (${tagData.code})' contenteditable='false' spellcheck="false" class='tagify__tag ${tagData.class ? tagData.class : ""}' ${this.getAttributes(tagData)}>
                        <x title='remove tag' class='tagify__tag__removeBtn'></x>
                        <div>
                            <div class="country-autocomplete-item">
                              ${tagData.code ? `<span onerror="this.style.visibility='hidden'" class="fi fi-${tagData.code.toLowerCase()}"></span>` : ''}
                              <span class='tagify__tag-text'>${tagData.name} (${tagData.code})</span>
                            </div>
                        </div>
                    </tag>`
                                }
                                catch(err){}
                            },

                            dropdownItem : function(tagData){
                                try{
                                    return `<div class='tagify__dropdown__item ${tagData.class ? tagData.class : ""}' tagifySuggestionIdx="${tagData.tagifySuggestionIdx}" style="width: 100% !important;">
                        <div class="country-autocomplete-item">
                          <span onerror="this.style.visibility = 'hidden'" class="fi fi-${tagData.code.toLowerCase()}"></span>
                          <span>${tagData.name} (${tagData.code})</span>
                        </div>
                    </div>`
                                }
                                catch(err){}
                            }
                        },
                        hooks: {
                            beforePaste: function (ClipboardEvent ,tagify) {
                                return new Promise(function(resolve, reject){
                                    _application_country_controller_ && _application_country_controller_.abort();
                                    _application_country_controller_ = new AbortController();
                                    cassiopeia_tagifies['tagify_issue_agent'].data('tagify').loading(true).dropdown.hide();
                                    fetch(location.protocol+'//'+location.host +'/cassiopeia/agent/ajax/autocomplete?string=' + tagify.pastedText +'&type=tagify', {signal:_application_country_controller_.signal})
                                        .then(RES => RES.json())
                                        .then(function(applicationCountryNewWhitelist){
                                            cassiopeia_tagifies['tagify_issue_agent'].data('tagify').whitelist = applicationCountryNewWhitelist; // update whitelist Array in-place
                                            cassiopeia_tagifies['tagify_issue_agent'].data('tagify').loading(false).dropdown.show(tagify.pastedText); // render the suggestions dropdown
                                        });
                                    resolve();
                                });
                            }
                        }
                    });
                    cassiopeia_tagifies['tagify_issue_agent'].on('input', function(e, data){
                        cassiopeia_tagifies['tagify_issue_agent'].data('tagify').whitelist = null; // reset the whitelist
                        clearTimeout(typingTimer);
                        typingTimer = setTimeout(function() {
                            let _value_ = data.value;
                            _application_country_controller_ && _application_country_controller_.abort();
                            _application_country_controller_ = new AbortController();
                            cassiopeia_tagifies['tagify_issue_agent'].data('tagify').loading(true).dropdown.hide();
                            fetch(location.protocol+'//'+location.host +'/cassiopeia/agent/ajax/autocomplete?string=' + _value_+'&type=tagify', {signal:_application_country_controller_.signal})
                                .then(RES => RES.json())
                                .then(function(applicationCountryNewWhitelist){
                                    cassiopeia_tagifies['tagify_issue_agent'].data('tagify').whitelist = applicationCountryNewWhitelist; // update whitelist Array in-place
                                    cassiopeia_tagifies['tagify_issue_agent'].data('tagify').loading(false).dropdown.show(_value_); // render the suggestions dropdown
                                })
                        },300);
                    });
                    cassiopeia_tagifies['tagify_issue_agent'].on('change', function (e,data) {
                        let form = '.cassiopeia-ticket-issue-form';
                        let field_name = 'issue-group[agent]';
                        if (typeof (data) !== 'undefined') {
                            $(form + ' input[name="'+field_name+'"]').val(data);
                            setTimeout(function () {
                                $(form + ' input[name="'+field_name+'"]').trigger('blur');
                            }, 100);
                        }else {
                            $(form + ' input[name="'+field_name+'"]').val('');
                            setTimeout(function () {
                                $(form + ' input[name="'+field_name+'"]').trigger('blur');
                            }, 100);
                        }
                    });
                });
            });
        },
        detach: function(context, settings, trigger) {
            $('.cassiopeia-ticket-issue-form', context).removeOnce('cassiopeia-ticket-issue-form', function() {});
        }
    };
})(jQuery);