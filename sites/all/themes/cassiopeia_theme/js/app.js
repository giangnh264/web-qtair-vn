function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'vi'}, 'google_translate_element');
}
function get_number_of_night() {
  var _start = jQuery(".start_date").val();
  var splitter = _start.split("/");
  var new_start = splitter[1] + "/" + splitter[0] + "/" + splitter[2];
  start = new Date(new_start);
  var _end = jQuery(".end_date").val();
  var splitter = _end.split("/");
  var new_end = splitter[1] + "/" + splitter[0] + "/" + splitter[2];
  end = new Date(new_end);
  // end - start returns difference in milliseconds
  if (end < start) {
    jQuery(".number_of_night").val(1);
    start.setDate(start.getDate() + 1);
    var dd = start.getDate();
    var mm = start.getMonth() + 1;
    var y = start.getFullYear();
    if (parseInt(dd) < 10) {
      dd = "0" + dd;
    }
    if (parseInt(mm) < 10) {
      mm = "0" + mm;
    }
    var someFormattedDate = dd + "/" + mm + "/" + y;
    jQuery(".end_date").val(someFormattedDate);
  } else {
    var diff = new Date(end - start);

    // get days
    var days = diff / 1000 / 60 / 60 / 24;
    console.log(new_start);
    jQuery(".number_of_night").val(days);
  }
}
function formatNumber(n) {
  // format number 1000000 to 1,234,567
  return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}
async function copyPageUrl() {
    try {
        copy("123123");
        alert('Page URL copied to clipboard');
    } catch (err) {
        alert(err);
    }
}

(function ($) {
  $(document).ready(function () {
    setTimeout(function () {
      googleTranslateElementInit();
    },500)
      // let response =  fetch("http://kenfox.3sgroup.vn");
      // console.log("res",response);
      $.fn.cassiopeiaAlert = function (data) {
          let _html = "<ul class='pd-0 mg-0'>";
          jQuery.each(JSON.parse(data), function( index, value ) {
              _html+="<li>"+value+"</li>";
          });
          _html+="</ul>";
          $.dialog({
              title: null,
              content: _html
          });
          $("#modalTopup").modal("hide");
      };
    $(".btn-copy").click(function (e) {
        copyPageUrl();
    });
    $(".header-login-icon-responsive").click(function (e) {
        e.stopPropagation();
        $(".header-user-menu").toggleClass("active");
    });
    $(".toggle-menu").click(function (e) {
        e.stopPropagation();
       $(".header-navigator").toggleClass("active");
    });
      $("body").click(function (e) {
          $(".header-navigator").removeClass("active");
          $(".extend-block").removeClass("active");
      });
    $(".play-button").click(function () {
      var src = $(this).data("src");
      $("#modalVideo .modal-body").html(
        '<iframe width="560" height="315" src="' +
          src +
          '?autoplay=1&rel=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>'
      );
      console.log(src);
      $("#modalVideo").modal("show");
    });
    $("#modalVideo").on("hidden.bs.modal", function () {
      $("#modalVideo .modal-body").html("");
    });
    $(".start_date").change(function (e) {
      get_number_of_night();
    });
    $(".end_date").change(function (e) {
      get_number_of_night();
    });
   


    $("input.number_format").keyup(function (e) {
      var _this = $(this);
      var Price = _this.val();
      Price = Price.replace(".", "");
      _this.val(formatNumber(Price));
    });
    $(".date-picker").datetimepicker({
      format: "d/m/Y",
      timepicker: false,
    });
    $(".btn-booking-hotel").click(function (e) {
      var nid = $(this).attr("data-nid");
      var _data = {};
      var _hotel = $("input#hotel").val();
      var flag = false;
      $(".table-room tr").each(function (e) {
        var _this = $(this);
        var room_id = _this.find(".number-room input").attr("data-room-id");

        var quantity = _this.find(".number-room input").val();
        if (quantity > 0) {
          flag = true;
          _data[room_id] = quantity;
        }
      });
      if (flag == false) {
        alert("Mời bạn chọn số lượng phòng!");
        return;
      }
      $.ajax({
        method: "post",
        url: "/cassiopeia/ajax",
        data: {
          cmd: "booking_room",
          data: _data,
          hotel: _hotel,
        },
        success: function (result) {
          if (result.status == "OK") {
            // alert(result.message);
            location.href = "/hotel/room/booking";
          } else {
            alert(result.message);
          }
          $(".loading-block").removeClass("active");
        },
      });
      return false;
    });
    $(".page-detail-hotel .number-room .fa-plus").click(function (e) {
      var _parent = $(".page-detail-hotel .number-room").has($(this));
      var _elment = _parent.find(".numberOfroom");
      var _value = parseInt(_elment.val());
      _elment.val(_value + 1);
    });
    $(".page-detail-hotel .number-room .fa-minus").click(function (e) {
      var _parent = $(".page-detail-hotel .number-room").has($(this));
      var _elment = _parent.find(".numberOfroom");
      var _value = parseInt(_elment.val());
      if (_parent.hasClass("children")) {
        if (_value > 0) {
          _elment.val(_value - 1);
        }
      } else {
        if (_value > 0) {
          _elment.val(_value - 1);
        }
      }
    });
    $(".page-autic-family .page-banner .banner-button button").click(function (
      e
    ) {
      $("html, body").animate(
        {
          scrollTop: $(".page-autic-family .register-block").offset().top,
        },
        1000
      );
    });
    //page family
    $(".page-autic-family .block-benefits a.register-block_family").click(
      function (e) {
        $("html, body").animate(
          {
            scrollTop: $(".page-autic-family .register-block").offset().top,
          },
          1000
        );
      }
    );

    $(window).on("scroll", function () {
      if ($(".hotel-img").length > 0) {
        var _top = $(".hotel-img").offset().top + 490;
        $(".hotel-view-links").toggleClass(
          "active",
          $(window).scrollTop() > _top
        );
      }
    });
    $(".hotel-view-links ul li a").on("click", function (e) {
      e.preventDefault();
      var _href = $(this).attr("href");
      $(".hotel-view-links ul li a").removeClass("active");
      $(this).addClass("active");
      $("html, body").animate(
        {
          scrollTop: $(_href).offset().top - 70,
        },
        800
      );
    });
    $(".node-price-right .buttons a").on("click", function (e) {
      e.preventDefault();
      var _href = $(this).attr("href");
      $("html, body").animate(
        {
          scrollTop: $(_href).offset().top - 60,
        },
        800
      );
    });

    $(".addThis_iconContact").click(function (e) {
      $(".addThis_listSharing").toggleClass("active");
    })
    $(".addThis_close").click(function (e) {
        $(".addThis_listSharing").removeClass("active");
    })
    $(".addThis_iconContact, .addThis_close").click(function() {
        let value = $(".addThis_listSharing").css("display");
        console.log(value);
        if(value == "none"){
            $(".addThis_listSharing").css({
                'display' : 'block'
            })
        } else {
            $(".addThis_listSharing").css({
                'display' : 'none'
            })
        }
    })

    var screenWidth = $(window).width();
    if (screenWidth < 600) {
      $(".search-fly-form .input-fn > input").attr("readonly", "readonly");
    }
    $("body").on("click", ".desktop-detail-row", function (e) {
      var key = $(this).attr("data-key");
      if ($(".mobile-detail-row[data-key='" + key + "']").hasClass("active")) {
        $(".mobile-detail-row[data-key='" + key + "']").removeClass("active");
      } else {
        $(".mobile-detail-row[data-key='" + key + "']").addClass("active");
      }
    });
    if ($(".page-user").length) {
      $(".avatar a").click(function (e) {
        $("html, body").animate(
          {
            scrollTop: 0,
          },
          500
        );
        $(".page-logined .page-inner .left-block").addClass("active");
        return false;
      });
    }

    $(".get_terms_service").click(function (e) {
      $("#modalTermsOfService").modal("show");
    });
    $("ul.tx-handbook > li ").click(function () {
      var _this = $(this);
      if (_this.hasClass("active")) {
      } else {
        $("ul.tx-handbook > li ").removeClass("active");
        _this.addClass("active");
      }
      var extra = $(this).find("ul");
      $("ul.tx-handbook > li").not(_this).find("ul").stop().slideUp();
      console.log(extra);
      if (extra.is(":visible")) {
        // extra.stop().slideUp();
      } else {
        extra.stop().slideDown();
      }
    });
    $("ul.tx-handbook > li ul span").click(function () {
      var _this = $(this);
      if (_this.hasClass("active")) {
      } else {
        $("ul.tx-handbook > li ul span ").removeClass("active");
        _this.addClass("active");
      }
    });
    $(".tx-handbook .tx-handbook-sub span").click(function (e) {
      var nid = $(this).attr("data-nid");
      $(".tx-handbook .right-block ul.nav a[href='#tab-" + nid + "']").click();
    });

    $("#user-register-form .form-actions button[type=submit]").click(function (
      e
    ) {
      var _tel_regex = /^\d*$/;
      // var _mail_regex = /^[a-z][a-z0-9_\.]{5,32}@[a-z0-9]{2,}(\.[a-z0-9]{2,4}){1,2}$/gm;
      var tel = $("#user-register-form .input-group input[name='name']").val();
      var email = $(
        "#user-register-form .input-group input[name='mail']"
      ).val();
      var full_name = $(
        "#user-register-form .input-group input[name='field_account_full_name[und][0][value]']"
      ).val();
      if (full_name.trim() == "") {
        alert("Bạn chưa nhập Họ và tên!");
        $(
          "#user-register-form .input-group input[name='field_account_full_name[und][0][value]']"
        ).focus();
        $(
          "#user-register-form .input-group input[name='field_account_full_name[und][0][value]']"
        ).select();
        return false;
      }
      if (full_name.trim() == "") {
        alert("Bạn chưa nhập Email!");
        $("#user-register-form .input-group input[name='mail']").focus();
        $("#user-register-form .input-group input[name='mail']").select();
        return false;
      }
      if (tel.match(_tel_regex) == null) {
        alert("Vui lòng nhập số điện thoại hợp lệ!");
        $("#user-register-form .input-group input[name='name']").focus();
        $("#user-register-form .input-group input[name='name']").select();
        return false;
      }
      if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {
        // return (true)
      } else {
        alert("Vui lòng nhập email hợp lệ!");
        $("#user-register-form .input-group input[name='mail']").focus();
        $("#user-register-form .input-group input[name='mail']").select();
        return false;
      }
      // if(email.match(_mail_regex)==null){
      //
      //     return false;
      // }
    });
    $(".fake-a").click(function (e) {
      location.href = $(this).attr("data-href");
    });
    $("#cassiopeia-booking-filter-form input").change(function (e) {
      $("#cassiopeia-booking-filter-form").submit();
    });

    function formatTel(n) {
      // format number 1000000 to 1,234,567
      return n.replace(/\D/g, "");
    }

    $("input.tel_format").keyup(function (e) {
      var _this = $(this);
      var Price = _this.val();
      Price = Price.replace(".", "");
      _this.val(formatTel(Price));
    });

    $(
      ".page-agent-login #cassiopeia-custom-user-login-form button[type=submit]"
    ).click(function (e) {
      $(".loading-block").addClass("active");
      var agent_code = $("input[name='agent_code']").val();
      var username = $("input[name='username']").val();
      var password = $("input[name='password']").val();
      var array = new Array();
      array.push(agent_code);
      array.push(username);
      array.push(password);
      $.ajax({
        method: "post",
        url: "/cassiopeia/ajax",
        data: {
          cmd: "custom_login",
          data: JSON.stringify(array),
        },
        success: function (result) {
          if (result.status == "OK") {
            // alert(result.message);
            location.href = "/";
          } else {
            alert(result.message);
          }
          $(".loading-block").removeClass("active");
        },
      });
      return false;
    });
    $(window).scroll(function () {
      var _top = $(window).scrollTop();
      if (_top > 0) {
        // $(".header-container").addClass("fixed");
      } else {
        // $(".header-container").removeClass("fixed");
      }
      if ($("#search-fly-form").length) {
        if (_top >= $("#search-fly-form").offset().top - 0) {
          $("#search-fly-form .search-fly-form-container").addClass("fixed");
        } else {
          $("#search-fly-form .search-fly-form-container").removeClass("fixed");
        }
      }
    });
    $(".search-fly-guest .text").click(function (e) {
      $(".search-fly-guest .search-fly-form-passenger").toggleClass("active");
      e.stopPropagation();
    });
    $(".search-fly-guest-hotel .text").click(function (e) {
      $(".search-fly-guest-hotel .search-fly-form-passenger").toggleClass("active");
      e.stopPropagation();
    });

    $('.form-radios').on('click', function (){
      if ($("#edit-payment-method-3").is(":checked") == true) {
          $('.node-payments-op-3').css('display', 'block');
      } else {
          $('.node-payments-op-3').css('display', 'none');
      }
  })


    $(".ul-star li").mouseover(function () {
      let value = $(this).attr("data-val");
      $(".ul-star li i").removeClass("fa-solid");
      $(".ul-star li").each(function (key, number) {
        if (key + 1 <= value) {
          $(this).find("i").addClass("fa-solid");
        }
      });
      $(".rate_score").val(value);
    });

    $('.modal').on('show.bs.modal', function(e) {
      $(window).resize();
    });
    $('.imageGallery').lightSlider({
      gallery:true,
      item:1,
      loop:true,
      thumbItem:4,
      slideMargin:5,
      thumbMargin: 10,
      enableDrag: true,
      currentPagerPosition:'left',
    });

    var owl = $(".owl-single");
    owl.owlCarousel({
      items: 1,
      dots: false,
      loop: true,
      nav: true,
      navText:["<i class=\"fa-regular fa-chevron-left\"></i>","<i class=\"fa-regular fa-chevron-right\"></i>"],
    });
    var owl = $(".owl-custom");
    let _items = owl.attr("data-item");
    owl.owlCarousel({
      items: _items,
      dots: false,
      loop: true,
      margin: 15,
      responsive: {
        // breakpoint from 0 up
        0: {
          items: 1,
          margin: 10,
        },
        // breakpoint from 768 up
        768: {
          items: 2,
        },
        1024: {
          items: 3,
        },
      },
    });
    var owl = $(".slider-3");
    owl.owlCarousel({
      items: 3,
      dots: false,
      loop: true,
      margin: 14,
      //   autoplay: true,
      //   autoplayTimeout: 3000,
      //   autoplayHoverPause: true,
      responsive: {
        // breakpoint from 0 up
        0: {
          items: 1,
          margin: 10,
          autoWidth: true,
        },
        // breakpoint from 768 up
        768: {
          items: 2,
        },
        1024: {
          items: 3,
        },
      },
    });
    var owl = $(".au-slider");
    owl.owlCarousel({
      items: 1,
      dots: true,
      loop: true,
      margin: 30,
      autoplay: true,
      autoplayTimeout: 4000,
      autoplayHoverPause: true,
    });
    var owl = $(".introduction-slider");
    owl.owlCarousel({
      items: 1,
      dots: true,
      loop: true,
      margin: 30,
    });
    var owl = $(".promotion-hotel-slider");
    owl.owlCarousel({
      items: 3,
      dots: true,
      loop: true,
      autoplay: true,
      nav: true,
      autoplaySpeed: 1200,
      autoplayTimeout: 4000,
      autoplayHoverPause: true,
      margin: 30,
      responsive: {
        0: {
          items: 1,
        },
        600: {
          items: 2,
        },
        1000: {
          items: 3,
        },
      },
    });
    owl.owlCarousel({
      items: 3,
      dots: true,
      loop: true,
      autoplay: true,
      autoplayTimeout: 4000,
      autoplayHoverPause: true,
      margin: 30,
      responsive: {
        0: {
          items: 1,
        },
        600: {
          items: 2,
        },
        1000: {
          items: 3,
        },
      },
    });
    var owl = $(".favorite-article-slider");
    owl.owlCarousel({
      items: 3,
      loop: true,
      margin: 30,
      autoplay: true,
      autoplayTimeout: 4000,
      autoplayHoverPause: true,
      responsive: {
        0: {
          items: 1,
        },
        600: {
          items: 1,
        },
        1000: {
          items: 3,
        },
      },
    });

    var owlHotel = $('.slider-hotel-price').owlCarousel({
      loop:true,
      nav: false,
      dots: true,
      autoplay:true,
      autoplaySpeed: 1200,
      autoplayTimeout: 5000,
      autoplayHoverPause:true,
      responsive: {
        0: {
          items: 1,
          margin: 10,
        },
        600: {
          items: 2,
          margin: 20,
        },
        992: {
          items: 3,
          margin: 30,
        },
      },
    });

    var owlPromotion = $('.slider-promotion').owlCarousel({
      loop:true,
      nav: true,
      dots: false,
      navText:["<i class=\"fa-regular fa-angle-left\"></i>","<i class=\"fa-regular fa-angle-right\"></i>"],
      autoplay:true,
      autoplaySpeed: 1200,
      autoplayTimeout: 4000,
      autoplayHoverPause:true,
      responsive: {
        0: {
          items: 2,
          margin: 20,
        },
        992: {
          items: 3,
          margin: 30,
        },
      },
    });

    $(".mobile-close > span").click(function (e) {
      $(".header-menu").removeClass("active");
    });
    $(".header-icon-responsive").click(function (e) {
      $(".header-menu").addClass("active");
    });

    $(".node-mobile-close> span").click(function (e) {
      $(".page-logined .page-inner .left-block").removeClass("active");
    });

    $(".page-article-detail.page-page-detail .node-content .col-xs-8").click(
      function (e) {
        $(
          ".page-article-detail.page-page-detail .node-content .col-xs-4"
        ).toggleClass("active");
      }
    );

    $(".block-benefits").click(function (e) {
      $(".search-fly-form-body .input-fn .fake-input-text").removeClass(
        "add-class"
      );
    });
    $(".Input-ReturnDate").click(function (e) {
      $(".search-fly-form-body .input-fn .fake-input-text").removeClass(
        "add-class"
      );
    });
    $(".sub-search-content").click(function (e) {
      $(".search-fly-form-body .input-fn .fake-input-text").removeClass(
        "add-class"
      );
    });
    $(".search-fly-form-body .input-fn .fake-input-text").click(function (e) {
      $(this).addClass("add-class");
    });
    $(".icon-mobile-show").click(function (e) {
      $(".page-flight-search .page-container .flights .col-md-4").toggleClass(
        "active"
      );
    });

    $(".btn-search-respon").click(function (e) {
      $(".page-flight-search > div.container:nth-child(3)").addClass("_show");
    });
    $(".close-form-respon > span").click(function (e) {
      $(".page-flight-search > div.container:nth-child(3)").removeClass("_show");
    });
    $(".btn-filter-respon").click(function (e) {
      $(".block-filter .search-flight-block-filter:last-child").addClass("_show");
    });
    $("body").on("click", ".close-form-sort", function(e) {
      $(".block-filter .search-flight-block-filter:last-child").removeClass("_show");
    });
    

    var list_content = $(".banner");
    $(window).scroll(function () {
      if ($(window).scrollTop() > 1) {
        $(".header>div").addClass("fixed");
      } else {
        $(".header>div").removeClass("fixed");
      }
    });

    // $("#modal_login").modal("show");
    $(".report-items>tbody>tr").click(function () {
      var id = $(this).attr("data-id");
      $(".report-items>tbody>tr.visible-xs[data-id='" + id + "']").addClass(
        "hg"
      );
    });
    $(".btn-add-to-cart").click(function () {
      $(".loading-block").addClass("active");
      var product_id = $(this).attr("data-nid");
      $.ajax({
        method: "POST",
        url: "cassiopeia/ajax",
        data: {
          cmd: "add-to-cart",
          product_id: product_id,
        },
        success: function () {
          $(".loading-block").removeClass("active");
        },
      });
    });

    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
          $(".page-logined .avatar img").attr("src", e.target.result);
        };

        reader.readAsDataURL(input.files[0]); // convert to base64 string
      }
    }

    $(".page-logined #user-profile-form input").change(function () {
      readURL(this);
    });
    $(".filter-hotel-mb").on("click", function () {
      $(".page-hotel-filter .left-block").addClass("_show");
    });
    $(".close-filter-hotel-mb").on("click", function () {
      $(".page-hotel-filter .left-block").removeClass("_show");
    });
    $(window).on("scroll", function () {
      if ($(".hotel-room").length !== 0) {
        var elTop = $(".hotel-room").offset().top;
        $(".hotel-room-booking").toggleClass(
          "active",
          $(window).scrollTop() > elTop
        );
      }
    });
    $(".suggest-close").on("click", function () {
      $(".sub-search").css("display", "none");
    });
  });
})(jQuery);

(function ($) {
    $(document).ready(function () {
        $("body").on("click",".btn-print",function (e) {
            var myWindow=window.open('','','width=800,height=600');
            let _print_content = $("#printContent").html();
            myWindow.document.write(_print_content);

            myWindow.document.close();
            myWindow.focus();
            myWindow.print();
            myWindow.close();
        });
        var mainSlider = new Swiper("#main-slider .swiper-container", {
            effect: "fade",
            fadeEffect: {
                crossFade: true,
            },
            autoplay: {
                delay: 3000,
                disableOnInteraction: true,
            },
            speed: 1200,
            pagination: {
                el: ".main-slider .swiper-pagination",
                clickable: true,
            },
        });

        var pageSlider = new Swiper(".page-slider .swiper", {
            effect: "fade",
            fadeEffect: {
                crossFade: true,
            },
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            speed: 1200,
            pagination: {
                el: ".main-slider .swiper-pagination",
                clickable: true,
            },
        });

        var sliderRange1 = $("#sliderRange1");
        var sliderRange2 = $("#sliderRange2");

        if (sliderRange1.length > 0) {
            sliderRange1.slider({
                range: true,
                min: 0,
                max: 24,
                values: [0, 24],
            });
        }

        if (sliderRange1.length > 0) {
            sliderRange2.slider({
                range: true,
                min: 0,
                max: 24,
                values: [3, 21],
            });
        }

        var sidebarHeight = $(window).outerHeight() || 0;
        var headerHeight = $(".header").outerHeight() || 0;

        $(".main-content").css("min-height", sidebarHeight - headerHeight);
    });
})(jQuery);
