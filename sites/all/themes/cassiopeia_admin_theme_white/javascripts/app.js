/*! AdminLTE app.js
 * ================
 * Main JS application file for AdminLTE v2. This file
 * should be included in all pages. It controls some layout
 * options and implements exclusive AdminLTE plugins.
 *
 * @Author  Almsaeed Studio
 * @Support <http://www.almsaeedstudio.com>
 * @Email   <abdullah@almsaeedstudio.com>
 * @version 2.3.8
 * @license MIT <http://opensource.org/licenses/MIT>
 */

//Make sure jQuery has been loaded before app.js
if (typeof jQuery === "undefined") {
    throw new Error("AdminLTE requires jQuery");
}

/* AdminLTE
 *
 * @type Object
 * @description jQuery.AdminLTE is the main object for the template's app.
 *              It's used for implementing functions and options related
 *              to the template. Keeping everything wrapped in an object
 *              prevents conflict with other plugins and is a better
 *              way to organize our code.
 */
jQuery.AdminLTE = {};

/* --------------------
 * - AdminLTE Options -
 * --------------------
 * Modify these options to suit your implementation
 */
jQuery.AdminLTE.options = {
    //Add slimscroll to navbar menus
    //This requires you to load the slimscroll plugin
    //in every page before app.js
    navbarMenuSlimscroll: true,
    navbarMenuSlimscrollWidth: "3px", //The width of the scroll bar
    navbarMenuHeight: "200px", //The height of the inner menu
    //General animation speed for JS animated elements such as box collapse/expand and
    //sidebar treeview slide up/down. This options accepts an integer as milliseconds,
    //'fast', 'normal', or 'slow'
    animationSpeed: 500,
    //Sidebar push menu toggle button selector
    sidebarToggleSelector: "[data-toggle='offcanvas']",
    //Activate sidebar push menu
    sidebarPushMenu: true,
    //Activate sidebar slimscroll if the fixed layout is set (requires SlimScroll Plugin)
    sidebarSlimScroll: true,
    //Enable sidebar expand on hover effect for sidebar mini
    //This option is forced to true if both the fixed layout and sidebar mini
    //are used together
    sidebarExpandOnHover: false,
    //BoxRefresh Plugin
    enableBoxRefresh: true,
    //Bootstrap.js tooltip
    enableBSToppltip: true,
    BSTooltipSelector: "[data-toggle='tooltip']",
    //Enable Fast Click. Fastclick.js creates a more
    //native touch experience with touch devices. If you
    //choose to enable the plugin, make sure you load the script
    //before AdminLTE's app.js
    enableFastclick: false,
    //Control Sidebar Tree views
    enableControlTreeView: true,
    //Control Sidebar Options
    enableControlSidebar: true,
    controlSidebarOptions: {
        //Which button should trigger the open/close event
        toggleBtnSelector: "[data-toggle='control-sidebar']",
        //The sidebar selector
        selector: ".control-sidebar",
        //Enable slide over content
        slide: true
    },
    //Box Widget Plugin. Enable this plugin
    //to allow boxes to be collapsed and/or removed
    enableBoxWidget: true,
    //Box Widget plugin options
    boxWidgetOptions: {
        boxWidgetIcons: {
            //Collapse icon
            collapse: 'fa-minus',
            //Open icon
            open: 'fa-plus',
            //Remove icon
            remove: 'fa-times'
        },
        boxWidgetSelectors: {
            //Remove button selector
            remove: '[data-widget="remove"]',
            //Collapse button selector
            collapse: '[data-widget="collapse"]'
        }
    },
    //Direct Chat plugin options
    directChat: {
        //Enable direct chat by default
        enable: true,
        //The button to open and close the chat contacts pane
        contactToggleSelector: '[data-widget="chat-pane-toggle"]'
    },
    //Define the set of colors to use globally around the website
    colors: {
        lightBlue: "#3c8dbc",
        red: "#f56954",
        green: "#00a65a",
        aqua: "#00c0ef",
        yellow: "#f39c12",
        blue: "#0073b7",
        navy: "#001F3F",
        teal: "#39CCCC",
        olive: "#3D9970",
        lime: "#01FF70",
        orange: "#FF851B",
        fuchsia: "#F012BE",
        purple: "#8E24AA",
        maroon: "#D81B60",
        black: "#222222",
        gray: "#d2d6de"
    },
    //The standard screen sizes that bootstrap uses.
    //If you change these in the variables.less file, change
    //them here too.
    screenSizes: {
        xs: 480,
        sm: 768,
        md: 992,
        lg: 1200
    }
};

/* ------------------
 * - Implementation -
 * ------------------
 * The next block of code implements AdminLTE's
 * functions and plugins as specified by the
 * options above.
 */
jQuery(function () {
    "use strict";

    //Fix for IE page transitions
    jQuery("body").removeClass("hold-transition");

    //Extend options if external options exist
    if (typeof AdminLTEOptions !== "undefined") {
        jQuery.extend(true,
            jQuery.AdminLTE.options,
            AdminLTEOptions);
    }

    //Easy access to options
    var o = jQuery.AdminLTE.options;

    //Set up the object
    _init();

    //Activate the layout maker
    jQuery.AdminLTE.layout.activate();

    //Enable sidebar tree view controls
    if (o.enableControlTreeView) {
        jQuery.AdminLTE.tree('.sidebar');
    }

    //Enable control sidebar
    if (o.enableControlSidebar) {
        jQuery.AdminLTE.controlSidebar.activate();
    }

    //Add slimscroll to navbar dropdown
    if (o.navbarMenuSlimscroll && typeof jQuery.fn.slimscroll != 'undefined') {
        jQuery(".navbar .menu").slimscroll({
            height: o.navbarMenuHeight,
            alwaysVisible: false,
            size: o.navbarMenuSlimscrollWidth
        }).css("width", "100%");
    }

    //Activate sidebar push menu
    if (o.sidebarPushMenu) {
        jQuery.AdminLTE.pushMenu.activate(o.sidebarToggleSelector);
    }

    //Activate Bootstrap tooltip
    if (o.enableBSToppltip) {
        jQuery('body').tooltip({
            selector: o.BSTooltipSelector,
            container: 'body'
        });
    }

    //Activate box widget
    if (o.enableBoxWidget) {
        jQuery.AdminLTE.boxWidget.activate();
    }

    //Activate fast click
    if (o.enableFastclick && typeof FastClick != 'undefined') {
        FastClick.attach(document.body);
    }

    //Activate direct chat widget
    if (o.directChat.enable) {
        jQuery(document).on('click', o.directChat.contactToggleSelector, function () {
            var box = jQuery(this).parents('.direct-chat').first();
            box.toggleClass('direct-chat-contacts-open');
        });
    }

  /*
   * INITIALIZE BUTTON TOGGLE
   * ------------------------
   */
    jQuery('.btn-group[data-toggle="btn-toggle"]').each(function () {
        var group = jQuery(this);
        jQuery(this).find(".btn").on('click', function (e) {
            group.find(".btn.active").removeClass("active");
            jQuery(this).addClass("active");
            e.preventDefault();
        });

    });
});

/* ----------------------------------
 * - Initialize the AdminLTE Object -
 * ----------------------------------
 * All AdminLTE functions are implemented below.
 */
function _init() {
    'use strict';
  /* Layout
   * ======
   * Fixes the layout height in case min-height fails.
   *
   * @type Object
   * @usage jQuery.AdminLTE.layout.activate()
   *        jQuery.AdminLTE.layout.fix()
   *        jQuery.AdminLTE.layout.fixSidebar()
   */
    jQuery.AdminLTE.layout = {
        activate: function () {
            var _this = this;
            _this.fix();
            _this.fixSidebar();
            jQuery('body, html, .wrapper').css('height', 'auto');
            jQuery(window, ".wrapper").resize(function () {
                _this.fix();
                _this.fixSidebar();
            });
        },
        fix: function () {
            // Remove overflow from .wrapper if layout-boxed exists
            jQuery(".layout-boxed > .wrapper").css('overflow', 'hidden');
            //Get window height and the wrapper height
            var footer_height = jQuery('.main-footer').outerHeight() || 0;
            var neg = jQuery('.main-header').outerHeight() + footer_height;
            var window_height = jQuery(window).height();
            var sidebar_height = jQuery(".sidebar").height() || 0;
            //Set the min-height of the content and sidebar based on the
            //the height of the document.
            if (jQuery("body").hasClass("fixed")) {
                jQuery(".content-wrapper, .right-side").css('min-height', window_height - footer_height);
            } else {
                var postSetWidth;
                if (window_height >= sidebar_height) {
                    jQuery(".content-wrapper, .right-side").css('min-height', window_height - neg);
                    postSetWidth = window_height - neg;
                } else {
                    jQuery(".content-wrapper, .right-side").css('min-height', sidebar_height);
                    postSetWidth = sidebar_height;
                }

                //Fix for the control sidebar height
                var controlSidebar = jQuery(jQuery.AdminLTE.options.controlSidebarOptions.selector);
                if (typeof controlSidebar !== "undefined") {
                    if (controlSidebar.height() > postSetWidth)
                        jQuery(".content-wrapper, .right-side").css('min-height', controlSidebar.height());
                }

            }
        },
        fixSidebar: function () {
            //Make sure the body tag has the .fixed class
            if (!jQuery("body").hasClass("fixed")) {
                if (typeof jQuery.fn.slimScroll != 'undefined') {
                    jQuery(".sidebar").slimScroll({destroy: true}).height("auto");
                }
                return;
            } else if (typeof jQuery.fn.slimScroll == 'undefined' && window.console) {
                window.console.error("Error: the fixed layout requires the slimscroll plugin!");
            }
            //Enable slimscroll for fixed layout
            if (jQuery.AdminLTE.options.sidebarSlimScroll) {
                if (typeof jQuery.fn.slimScroll != 'undefined') {
                    //Destroy if it exists
                    jQuery(".sidebar").slimScroll({destroy: true}).height("auto");
                    //Add slimscroll
                    jQuery(".sidebar").slimScroll({
                        height: (jQuery(window).height() - jQuery(".main-header").height()) + "px",
                        color: "rgba(0,0,0,0.2)",
                        size: "3px"
                    });
                }
            }
        }
    };

  /* PushMenu()
   * ==========
   * Adds the push menu functionality to the sidebar.
   *
   * @type Function
   * @usage: jQuery.AdminLTE.pushMenu("[data-toggle='offcanvas']")
   */
    jQuery.AdminLTE.pushMenu = {
        activate: function (toggleBtn) {
            //Get the screen sizes
            var screenSizes = jQuery.AdminLTE.options.screenSizes;

            //Enable sidebar toggle
            jQuery(document).on('click', toggleBtn, function (e) {
                e.preventDefault();

                //Enable sidebar push menu
                if (jQuery(window).width() > (screenSizes.sm - 1)) {
                    if (jQuery("body").hasClass('sidebar-collapse')) {
                        jQuery("body").removeClass('sidebar-collapse').trigger('expanded.pushMenu');
                    } else {
                        jQuery("body").addClass('sidebar-collapse').trigger('collapsed.pushMenu');
                    }
                }
                //Handle sidebar push menu for small screens
                else {
                    if (jQuery("body").hasClass('sidebar-open')) {
                        jQuery("body").removeClass('sidebar-open').removeClass('sidebar-collapse').trigger('collapsed.pushMenu');
                    } else {
                        jQuery("body").addClass('sidebar-open').trigger('expanded.pushMenu');
                    }
                }
            });

            jQuery(".content-wrapper").click(function () {
                //Enable hide menu when clicking on the content-wrapper on small screens
                if (jQuery(window).width() <= (screenSizes.sm - 1) && jQuery("body").hasClass("sidebar-open")) {
                    jQuery("body").removeClass('sidebar-open');
                }
            });

            //Enable expand on hover for sidebar mini
            if (jQuery.AdminLTE.options.sidebarExpandOnHover
                || (jQuery('body').hasClass('fixed')
                && jQuery('body').hasClass('sidebar-mini'))) {
                this.expandOnHover();
            }
        },
        expandOnHover: function () {
            var _this = this;
            var screenWidth = jQuery.AdminLTE.options.screenSizes.sm - 1;
            //Expand sidebar on hover
            jQuery('.main-sidebar').hover(function () {
                if (jQuery('body').hasClass('sidebar-mini')
                    && jQuery("body").hasClass('sidebar-collapse')
                    && jQuery(window).width() > screenWidth) {
                    _this.expand();
                }
            }, function () {
                if (jQuery('body').hasClass('sidebar-mini')
                    && jQuery('body').hasClass('sidebar-expanded-on-hover')
                    && jQuery(window).width() > screenWidth) {
                    _this.collapse();
                }
            });
        },
        expand: function () {
            jQuery("body").removeClass('sidebar-collapse').addClass('sidebar-expanded-on-hover');
        },
        collapse: function () {
            if (jQuery('body').hasClass('sidebar-expanded-on-hover')) {
                jQuery('body').removeClass('sidebar-expanded-on-hover').addClass('sidebar-collapse');
            }
        }
    };

  /* Tree()
   * ======
   * Converts the sidebar into a multilevel
   * tree view menu.
   *
   * @type Function
   * @Usage: jQuery.AdminLTE.tree('.sidebar')
   */
    jQuery.AdminLTE.tree = function (menu) {
        var _this = this;
        var animationSpeed = jQuery.AdminLTE.options.animationSpeed;
        jQuery(document).off('click', menu + ' li a')
            .on('click', menu + ' li a', function (e) {
                //Get the clicked link and the next element
                var jQuerythis = jQuery(this);
                var checkElement = jQuerythis.next();

                //Check if the next element is a menu and is visible
                if ((checkElement.is('.treeview-menu')) && (checkElement.is(':visible')) && (!jQuery('body').hasClass('sidebar-collapse'))) {
                    //Close the menu
                    checkElement.slideUp(animationSpeed, function () {
                        checkElement.removeClass('menu-open');
                        //Fix the layout in case the sidebar stretches over the height of the window
                        //_this.layout.fix();
                    });
                    checkElement.parent("li").removeClass("active");
                }
                //If the menu is not visible
                else if ((checkElement.is('.treeview-menu')) && (!checkElement.is(':visible'))) {
                    //Get the parent menu
                    var parent = jQuerythis.parents('ul').first();
                    //Close all open menus within the parent
                    var ul = parent.find('ul:visible').slideUp(animationSpeed);
                    //Remove the menu-open class from the parent
                    ul.removeClass('menu-open');
                    //Get the parent li
                    var parent_li = jQuerythis.parent("li");

                    //Open the target menu and add the menu-open class
                    checkElement.slideDown(animationSpeed, function () {
                        //Add the class active to the parent li
                        checkElement.addClass('menu-open');
                        parent.find('li.active').removeClass('active');
                        parent_li.addClass('active');
                        //Fix the layout in case the sidebar stretches over the height of the window
                        _this.layout.fix();
                    });
                }
                //if this isn't a link, prevent the page from being redirected
                if (checkElement.is('.treeview-menu')) {
                    e.preventDefault();
                }
            });
    };

  /* ControlSidebar
   * ==============
   * Adds functionality to the right sidebar
   *
   * @type Object
   * @usage jQuery.AdminLTE.controlSidebar.activate(options)
   */
    jQuery.AdminLTE.controlSidebar = {
        //instantiate the object
        activate: function () {
            //Get the object
            var _this = this;
            //Update options
            var o = jQuery.AdminLTE.options.controlSidebarOptions;
            //Get the sidebar
            var sidebar = jQuery(o.selector);
            //The toggle button
            var btn = jQuery(o.toggleBtnSelector);

            //Listen to the click event
            btn.on('click', function (e) {
                e.preventDefault();
                //If the sidebar is not open
                if (!sidebar.hasClass('control-sidebar-open')
                    && !jQuery('body').hasClass('control-sidebar-open')) {
                    //Open the sidebar
                    _this.open(sidebar, o.slide);
                } else {
                    _this.close(sidebar, o.slide);
                }
            });

            //If the body has a boxed layout, fix the sidebar bg position
            var bg = jQuery(".control-sidebar-bg");
            _this._fix(bg);

            //If the body has a fixed layout, make the control sidebar fixed
            if (jQuery('body').hasClass('fixed')) {
                _this._fixForFixed(sidebar);
            } else {
                //If the content height is less than the sidebar's height, force max height
                if (jQuery('.content-wrapper, .right-side').height() < sidebar.height()) {
                    _this._fixForContent(sidebar);
                }
            }
        },
        //Open the control sidebar
        open: function (sidebar, slide) {
            //Slide over content
            if (slide) {
                sidebar.addClass('control-sidebar-open');
            } else {
                //Push the content by adding the open class to the body instead
                //of the sidebar itself
                jQuery('body').addClass('control-sidebar-open');
            }
        },
        //Close the control sidebar
        close: function (sidebar, slide) {
            if (slide) {
                sidebar.removeClass('control-sidebar-open');
            } else {
                jQuery('body').removeClass('control-sidebar-open');
            }
        },
        _fix: function (sidebar) {
            var _this = this;
            if (jQuery("body").hasClass('layout-boxed')) {
                sidebar.css('position', 'absolute');
                sidebar.height(jQuery(".wrapper").height());
                if (_this.hasBindedResize) {
                    return;
                }
                jQuery(window).resize(function () {
                    _this._fix(sidebar);
                });
                _this.hasBindedResize = true;
            } else {
                sidebar.css({
                    'position': 'fixed',
                    'height': 'auto'
                });
            }
        },
        _fixForFixed: function (sidebar) {
            sidebar.css({
                'position': 'fixed',
                'max-height': '100%',
                'overflow': 'auto',
                'padding-bottom': '50px'
            });
        },
        _fixForContent: function (sidebar) {
            jQuery(".content-wrapper, .right-side").css('min-height', sidebar.height());
        }
    };

  /* BoxWidget
   * =========
   * BoxWidget is a plugin to handle collapsing and
   * removing boxes from the screen.
   *
   * @type Object
   * @usage jQuery.AdminLTE.boxWidget.activate()
   *        Set all your options in the main jQuery.AdminLTE.options object
   */
    jQuery.AdminLTE.boxWidget = {
        selectors: jQuery.AdminLTE.options.boxWidgetOptions.boxWidgetSelectors,
        icons: jQuery.AdminLTE.options.boxWidgetOptions.boxWidgetIcons,
        animationSpeed: jQuery.AdminLTE.options.animationSpeed,
        activate: function (_box) {
            var _this = this;
            if (!_box) {
                _box = document; // activate all boxes per default
            }
            //Listen for collapse event triggers
            jQuery(_box).on('click', _this.selectors.collapse, function (e) {
                e.preventDefault();
                _this.collapse(jQuery(this));
            });

            //Listen for remove event triggers
            jQuery(_box).on('click', _this.selectors.remove, function (e) {
                e.preventDefault();
                _this.remove(jQuery(this));
            });
        },
        collapse: function (element) {
            var _this = this;
            //Find the box parent
            var box = element.parents(".box").first();
            //Find the body and the footer
            var box_content = box.find("> .box-body, > .box-footer, > form  >.box-body, > form > .box-footer");
            if (!box.hasClass("collapsed-box")) {
                //Convert minus into plus
                element.children(":first")
                    .removeClass(_this.icons.collapse)
                    .addClass(_this.icons.open);
                //Hide the content
                box_content.slideUp(_this.animationSpeed, function () {
                    box.addClass("collapsed-box");
                });
            } else {
                //Convert plus into minus
                element.children(":first")
                    .removeClass(_this.icons.open)
                    .addClass(_this.icons.collapse);
                //Show the content
                box_content.slideDown(_this.animationSpeed, function () {
                    box.removeClass("collapsed-box");
                });
            }
        },
        remove: function (element) {
            //Find the box parent
            var box = element.parents(".box").first();
            box.slideUp(this.animationSpeed);
        }
    };
}

/* ------------------
 * - Custom Plugins -
 * ------------------
 * All custom plugins are defined below.
 */

/*
 * BOX REFRESH BUTTON
 * ------------------
 * This is a custom plugin to use with the component BOX. It allows you to add
 * a refresh button to the box. It converts the box's state to a loading state.
 *
 * @type plugin
 * @usage jQuery("#box-widget").boxRefresh( options );
 */
(function ($) {

    "use strict";

    jQuery.fn.boxRefresh = function (options) {

        // Render options
        var settings = jQuery.extend({
            //Refresh button selector
            trigger: ".refresh-btn",
            //File source to be loaded (e.g: ajax/src.php)
            source: "",
            //Callbacks
            onLoadStart: function (box) {
                return box;
            }, //Right after the button has been clicked
            onLoadDone: function (box) {
                return box;
            } //When the source has been loaded

        }, options);

        //The overlay
        var overlay = jQuery('<div class="overlay"><div class="fa fa-refresh fa-spin"></div></div>');

        return this.each(function () {
            //if a source is specified
            if (settings.source === "") {
                if (window.console) {
                    window.console.log("Please specify a source first - boxRefresh()");
                }
                return;
            }
            //the box
            var box = jQuery(this);
            //the button
            var rBtn = box.find(settings.trigger).first();

            //On trigger click
            rBtn.on('click', function (e) {
                e.preventDefault();
                //Add loading overlay
                start(box);

                //Perform ajax call
                box.find(".box-body").load(settings.source, function () {
                    done(box);
                });
            });
        });

        function start(box) {
            //Add overlay and loading img
            box.append(overlay);

            settings.onLoadStart.call(box);
        }

        function done(box) {
            //Remove overlay and loading img
            box.find(overlay).remove();

            settings.onLoadDone.call(box);
        }

    };

})(jQuery);

/*
 * EXPLICIT BOX CONTROLS
 * -----------------------
 * This is a custom plugin to use with the component BOX. It allows you to activate
 * a box inserted in the DOM after the app.js was loaded, toggle and remove box.
 *
 * @type plugin
 * @usage jQuery("#box-widget").activateBox();
 * @usage jQuery("#box-widget").toggleBox();
 * @usage jQuery("#box-widget").removeBox();
 */
(function ($) {

    'use strict';

    jQuery.fn.activateBox = function () {
        jQuery.AdminLTE.boxWidget.activate(this);
    };

    jQuery.fn.toggleBox = function () {
        var button = jQuery(jQuery.AdminLTE.boxWidget.selectors.collapse, this);
        jQuery.AdminLTE.boxWidget.collapse(button);
    };

    jQuery.fn.removeBox = function () {
        var button = jQuery(jQuery.AdminLTE.boxWidget.selectors.remove, this);
        jQuery.AdminLTE.boxWidget.remove(button);
    };

})(jQuery);

/*
 * TODO LIST CUSTOM PLUGIN
 * -----------------------
 * This plugin depends on iCheck plugin for checkbox and radio inputs
 *
 * @type plugin
 * @usage jQuery("#todo-widget").todolist( options );
 */
(function ($) {

    'use strict';

    jQuery.fn.todolist = function (options) {
        // Render options
        var settings = jQuery.extend({
            //When the user checks the input
            onCheck: function (ele) {
                return ele;
            },
            //When the user unchecks the input
            onUncheck: function (ele) {
                return ele;
            }
        }, options);

        return this.each(function () {

            if (typeof jQuery.fn.iCheck != 'undefined') {
                jQuery('input', this).on('ifChecked', function () {
                    var ele = jQuery(this).parents("li").first();
                    ele.toggleClass("done");
                    settings.onCheck.call(ele);
                });

                jQuery('input', this).on('ifUnchecked', function () {
                    var ele = jQuery(this).parents("li").first();
                    ele.toggleClass("done");
                    settings.onUncheck.call(ele);
                });
            } else {
                jQuery('input', this).on('change', function () {
                    var ele = jQuery(this).parents("li").first();
                    ele.toggleClass("done");
                    if (jQuery('input', ele).is(":checked")) {
                        settings.onCheck.call(ele);
                    } else {
                        settings.onUncheck.call(ele);
                    }
                });
            }
        });
    };


}(jQuery));
function formatNumber(n) {
    // format number 1000000 to 1,234,567
    return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}
(function ($) {

    $(document).ready(function(){
        $(".btn-delete-all-room-price").click(function (e) {
           if(confirm("Bạn có chắc chắn muốn xóa hết giá phòng?")){
               $.ajax({
                   method:"POST",
                   url:"/cassiopeia/ajax",
                   data:{
                       cmd:"delete_all_room_price",
                   },
                   success:function(result){

                   }
               })
           };
        });
        $("body").on("click",".desktop-detail-row",function (e) {
            var key = $(this).attr("data-key");
            if($(".mobile-detail-row[data-key='"+key+"']").hasClass("active")){
                $(".mobile-detail-row[data-key='"+key+"']").removeClass("active");
            }else{
                $(".mobile-detail-row[data-key='"+key+"']").addClass("active");
            }
        });
        $(".btn-close-modal").click(function(e){
            $(".modal").modal("hide");
        });
        $(".btn-delete-notify").click(function(e){
            var id = $(this).attr("data-id");
            $("#modal_delete_notify input[name='id']").val(id);
            $("#modal_delete_notify").css({"display":"flex","align-items":"center"});
            $("#modal_delete_notify").modal("show");
        });
        $(".btn-add-notify").click(function(e){
            $("#modal_add_notify").css({"display":"flex","align-items":"center"});
            $("#modal_add_notify").modal("show");
        });
        $("#sort_by").change(function(e){
            if($(this).is(":checked")){
                $("#cassiopeia-detail-report-tab-3-filter-form select[name='order_by']").val("ASC");
            }else{
                $("#cassiopeia-detail-report-tab-3-filter-form select[name='order_by']").val("DESC");
            }
            $("#cassiopeia-detail-report-tab-3-filter-form").submit();
        });
        function FunctionTextChangePlus() {
            var Price = document.getElementById("txtPricePlus").value;
            Price = Price.replace(",", "");
            $("#txtPricePlus").val(formatNumber(Price));
        }
        function formatNumber(n) {
            // format number 1000000 to 1,234,567
            return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ".")
        }
        $("input.number_format").keyup(function(e){
            var _this = $(this);
            var Price = _this.val();
            Price = Price.replace(".", "");
            _this.val(formatNumber(Price));
        });

        $("#cassiopeia-add-issue-report-form button").click(function(e){
            // var airline = $("#cassiopeia-add-issue-report-form select[name='airline']").val();
            // var tran_kind = $("#cassiopeia-add-issue-report-form select[name='tran_kind']").val();
            var PNR = $("#cassiopeia-add-issue-report-form input[name='PNR']").val();
            var quantity = $("#cassiopeia-add-issue-report-form input[name='quantity']").val();
            // var partner_price = $("#cassiopeia-add-issue-report-form input[name='partner_price']").val();
            // var price = $("#cassiopeia-add-issue-report-form input[name='price']").val();
            var agent = $("#cassiopeia-add-issue-report-form select[name='agent']").val();
            if(PNR==""){
                alert("Bạn chưa nhập PNR!");
                return false;
            }
            if(quantity==""){
                alert("Bạn chưa nhập số lượng!");
                return false;
            }
            if(agent==0){
                alert("Bạn chưa chọn Đại lý!");
                return false;
            }
            // $.ajax({
            //     method:"POST",
            //     url:"/cassiopeia/ajax",
            //     data:{
            //         cmd:"add_issue_report",
            //         airline : airline,
            //         tran_kind : tran_kind,
            //         PNR : PNR,
            //         quantity : quantity,
            //         partner_price : partner_price,
            //         price : price,
            //         agent : agent,
            //     },
            //     success:function(result){
            //         if(result.status=="OK"){
            //             $(".page-payment-report .block-items").html(result.html);
            //         }
            //     }
            // })
            // return false;
        });
        $(".btn-issue-report-edit").click(function(e){
            var id = $(this).attr("data-id");
            $.ajax({
                method:"POST",
                url:"/cassiopeia/ajax",
                data:{
                    cmd:"get_issue_report_by_id",
                    id : id,
                },
                success:function(result){
                    $("#modal_issue_report select[name='id']").val(result.object.id);
                    $("#modal_issue_report select[name='airline']").val(result.object.airline);
                    $("#modal_issue_report .form-item-airline .chosen-container-single .chosen-single span").text($("#modal_issue_report select[name='airline'] option:selected").text());
                    $("#modal_issue_report select[name='tran_kind']").val(result.object.tran_kind);
                    $("#modal_issue_report .form-item-tran-kind .chosen-container-single .chosen-single span").text($("#modal_issue_report select[name='tran_kind'] option:selected").text());
                    $("#modal_issue_report input[name='PNR']").val(result.object.PNR);
                    $("#modal_issue_report input[name='quantity']").val(result.object.quantity);
                    $("#modal_issue_report input[name='partner_price']").val(result.object.partner_price);
                    $("#modal_issue_report input[name='price']").val(result.object.price);
                    $("#modal_issue_report select[name='agent']").val(result.object.agent);
                    $("#modal_issue_report .form-item-agent .chosen-container-single .chosen-single span").text($("#modal_issue_report select[name='agent'] option:selected").text());
                    $("#modal_issue_report input[name='content']").val(result.object.content);
                }
            })
            $("#modal_issue_report").css("display","flex");
            $("#modal_issue_report").css("align-items","center");
            $("#modal_issue_report").modal("show");
        });
        $(".btn-add-issue-report").click(function(e){
            $("#modal_issue_report").css("display","flex");
            $("#modal_issue_report").css("align-items","center");
            $("#modal_issue_report").modal("show");
        });
        $(".btn-add-refund-report").click(function(e){
            $("#modal_refund_report").css("display","flex");
            $("#modal_refund_report").css("align-items","center");
            $("#modal_refund_report").modal("show");
            $("#modal_refund_report .modal-title").html("Thêm mới hoàn tiền");
        });

        $(".btn-add-tran-kind").click(function(e){
            $("#modal_tran_kind").css("display","flex");
            $("#modal_tran_kind").css("align-items","center");
            $("#modal_tran_kind").modal("show");
            $("#cassiopeia-add-tran-kind-form input[name='id']").val("");
            $("#cassiopeia-add-tran-kind-form input[name='name']").val("");
            $("#modal_tran_kind .modal-title").html("Thêm mới Loại giao dịch");
        });
        $(".btn-edit-tran-kind").click(function(e){
            $("#modal_tran_kind").css("display","flex");
            $("#modal_tran_kind").css("align-items","center");
            $("#modal_tran_kind").modal("show");
            var _kind = $(this).attr("data-kind");
            var _id = $(this).attr("data-id");
            var _name = $(this).attr("data-name");
            var _type = $(this).attr("data-type");
            console.log(_kind);
            $("#cassiopeia-add-tran-kind-form select[name='type']").val(_type);
            $("#cassiopeia-add-tran-kind-form input[name='id']").val(_id);
            $("#cassiopeia-add-tran-kind-form input[name='name']").val(_name);
            $("#cassiopeia-add-tran-kind-form select[name='kind']").val(_kind);
            $("#modal_tran_kind .modal-title").html("Sửa Loại giao dịch");
        });
        $(".btn-delete-tran-kind").click(function(e){
            $("#modal_delete_tran_kind").css("display","flex");
            $("#modal_delete_tran_kind").css("align-items","center");
            $("#modal_delete_tran_kind").modal("show");
            $("#modal_delete_tran_kind .confirm").text("Bạn có chắc chắn muốn xóa loại giao dịch "+$(this).attr("data-name")+" không?");
            $("#cassiopeia-delete-tran-kind-form input[name='id']").val($(this).attr("data-id"));
        });

        $(".btn-add-bank").click(function(e){
            $("#modal_bank").css("display","flex");
            $("#modal_bank").css("align-items","center");
            $("#modal_bank").modal("show");
            $("#cassiopeia-add-bank-form input[name='id']").val("");
            $("#cassiopeia-add-bank-form input[name='code']").val("");
            $("#cassiopeia-add-bank-form input[name='name']").val("");
            $("#modal_bank .modal-title").html("Thêm mới Ngân hàng");
        });
        $(".btn-edit-bank").click(function(e){
            $("#modal_bank").css("display","flex");
            $("#modal_bank").css("align-items","center");
            $("#modal_bank").modal("show");
            var _id = $(this).attr("data-id");
            var _code = $(this).attr("data-code");
            var _name = $(this).attr("data-name");
            $("#cassiopeia-add-bank-form input[name='id']").val(_id);
            $("#cassiopeia-add-bank-form input[name='code']").val(_code);
            $("#cassiopeia-add-bank-form input[name='name']").val(_name);
            $("#modal_bank .modal-title").html("Sửa ngân hàng");
        });
        $(".btn-delete-bank").click(function(e){
            $("#modal_delete_bank").css("display","flex");
            $("#modal_delete_bank").css("align-items","center");
            $("#modal_delete_bank").modal("show");
            $("#modal_delete_bank .confirm").text("Bạn có chắc chắn muốn xóa ngân hàng "+$(this).attr("data-name")+" không?");
            $("#cassiopeia-delete-bank-form input[name='id']").val($(this).attr("data-id"));
        });

        $(".btn-add-payment-report").click(function(e){
            $("#modal_payment_report").css("display","flex");
            $("#modal_payment_report").css("align-items","center");
            $("#modal_payment_report").modal("show");
        })
        $(".btn-close-modal").click(function(e){
            $("#modal_delete_khoan_muc").modal("hide");
        })
        $(".btn-update-payment-report").click(function(e){
            $("#modal_payment_report_update_status").css("display","flex");
            $("#modal_payment_report_update_status").css("align-items","center");
            $("#modal_payment_report_update_status").modal("show");
            $("#modal_payment_report_update_status .confirm").text("Bạn có muốn sử dụng khoản này?");
            $("#cassiopeia-update-payment-report-form input[name='id']").val($(this).attr("data-id"));
        });
        $(".btn-delete-khoan-muc").click(function(e){
            $("#modal_delete_khoan_muc").css("display","flex");
            $("#modal_delete_khoan_muc").css("align-items","center");
            $("#modal_delete_khoan_muc").modal("show");
            $("#modal_delete_khoan_muc .confirm").text("Bạn có chắc chắn muốn xóa khoản mục "+$(this).attr("data-name")+" không?");
            $("#cassiopeia-delete-khoan-muc-form input[name='id']").val($(this).attr("data-id"));
        });

        $(".btn-add-khoan-muc").click(function(e){
            $("#modal_khoan_muc").css("display","flex");
            $("#modal_khoan_muc").css("align-items","center");
            $("#modal_khoan_muc").modal("show");
            $("#cassiopeia-khoan-muc-form input[name='id']").val("");
            $("#cassiopeia-khoan-muc-form input[name='code']").val("");
            $("#cassiopeia-khoan-muc-form input[name='name']").val("");
            $("#modal_khoan_muc .modal-title").html("Thêm mới khoản mục");
        });

        $(".btn-edit-khoan-muc").click(function(e){
            $("#modal_khoan_muc").css("display","flex");
            $("#modal_khoan_muc").css("align-items","center");
            $("#modal_khoan_muc").modal("show");
            var _id = $(this).attr("data-id");
            var _code = $(this).attr("data-code");
            var _name = $(this).attr("data-name");
            $("#cassiopeia-khoan-muc-form input[name='id']").val(_id);
            $("#cassiopeia-khoan-muc-form input[name='code']").val(_code);
            $("#cassiopeia-khoan-muc-form input[name='name']").val(_name);
            $("#modal_khoan_muc .modal-title").html("Sửa khoản mục");
        });
        $("#cassiopeia-booking-filter-form .form-button .form-item-uncheck label").click(function(e){
           $("#cassiopeia-booking-filter-form").submit();
        });
        // $(".table-draggger tbody").sortable();
        $('.page-menu-config .item').each(function(){
           $(this).on('dragstart', function (event) {
               event.originalEvent.dataTransfer.setData("text", event.target.id);
               console.log(event);
           });
            $('.page-menu-config .item').on('dragover', function (event) {
                event.preventDefault();
            });
        });
        $('.page-menu-config .menu-create').on('drop', function (event) {
            event.preventDefault();
           var data = event.originalEvent.dataTransfer.getData("text");
            event.target.appendChild(document.getElementById(data));
       });

        $('.page-menu-config .menu-create').on('dragover', function (event) {
            event.preventDefault();
        });
        $('.page-menu-config .menu-items').on('drop', function (event) {
            event.preventDefault();
            var data = event.originalEvent.dataTransfer.getData("text");
            event.target.appendChild(document.getElementById(data));
        });
        $(".report-items>tbody>tr").click(function(){
            var id = $(this).attr("data-key");
            $(".report-items>tbody>tr.visible-xs[data-key='"+id+"']").toggleClass("active");
        })
        $(".btn-view-post-fields").click(function(e){
            var _html = $(this).parent().find("span.postfields").html();
           $("#modal_view_post_fields .modal-body").html(_html);
            $("#modal_view_post_fields").modal("show");
        });
        if($(".chosen").length){
            $(".chosen").select2();
        }
        if($("#cassiopeia-manager-point-filter-form select[name='date_filter']").length){
            let val = $("#cassiopeia-manager-point-filter-form select[name='date_filter']").val();
            if(val=="other"){
                $(".date-filter-group").addClass("active");
            }else{
                $(".date-filter-group").removeClass("active");
            }
        }
        let val = $("#cassiopeia-admin-topup-filter-form select[name='date_filter']").val();
        if(val=="other"){
            $(".date-filter-group").addClass("active");
        }else{
            $(".date-filter-group").removeClass("active");
        }
        $("#cassiopeia-admin-topup-filter-form select[name='date_filter']").change(function (e) {
            let val = $(this).val();
            if(val=="other"){
                $(".date-filter-group").addClass("active");
            }else{
                $(".date-filter-group").removeClass("active");
            }
        });
        $("#cassiopeia-manager-point-filter-form select[name='date_filter']").change(function (e) {
            let val = $(this).val();
            if(val=="other"){
                $(".date-filter-group").addClass("active");
            }else{
                $(".date-filter-group").removeClass("active");
            }
        });
    });

}(jQuery));