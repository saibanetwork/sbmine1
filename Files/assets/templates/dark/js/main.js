

(function ($) {
    "use strict";

    // ========================= Header Hide Click On Body Js Start =====================
    $(document).click(function (event) {
        if (!$(event.target).closest("#header").length) {
            if ($('.navbar-collapse').hasClass('show')) {
                document.getElementById("hiddenNav").click();
            }
        }
    });
    // ========================= Header Hide Click On Body Js End =====================

    // ==========================================
    //      Start Document Ready function\
    // ==========================================
    $(document).ready(function () {

        // ========================= Slick Slider Js Start =====================
        $('.testimonails-item-wrapper').slick({

            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            speed: 1000,
            dots: true,
            arrows: false,
            centerMode: true,
            prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-long-arrow-alt-left"></i></button>',
            nextArrow: '<button type="button" class="slick-next"><i class="fas fa-long-arrow-alt-right"></i></button>',
            responsive: [
                {
                    breakpoint: 1199,
                    settings: {
                        centerMode: false,
                        arrows: false,
                        slidesToShow: 2,
                        dots: true,
                    }
                },
                {
                    breakpoint: 991,
                    settings: {
                        centerMode: false,
                        arrows: false,
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 767,
                    settings: {
                        centerMode: false,
                        arrows: false,
                        slidesToShow: 1
                    }
                }
            ]
        });
        // ========================= Slick Slider Js End =====================

        // ========================= Password Show Hide Js Start ==========================
        $(".toggle-password").click(function () {
            var input = $($(this).attr("id"));
            if (input.attr("type") == "password") {
                input.attr("type", "text");
                $(this).addClass("fa-eye").removeClass('fa-eye-slash');
            } else {
                input.attr("type", "password");
                $(this).addClass("fa-eye-slash").removeClass('fa-eye');
            }
        });
        // ========================= Password Show Hide Js End ==========================

        // ========================= Toggle Dashbaord Menu Js Start =====================
        $(".dashboard-menu__item.has-submenu > a").on('click', function () {
            $.each($('ul.sub-menu').not($(this).parent().children('ul.sub-menu')), function (i, element) {
                if ($(element).css('display') === 'block') {
                    $(element).slideToggle(300);
                    $(element).parents('li.has-submenu').find(".dashboard-menu__link-arrow").removeClass("show")
                }
            });
            $(this).parent().find(".sub-menu").slideToggle(300, function () {
                $(".has-submenu > a").removeClass('active');
            });

        });

        //  Add Class On Arrow Icon To Change it
        $(".dashboard-menu__item.has-submenu > a").click(function () {
            $(this).find(".dashboard-menu__link-arrow").toggleClass("show")
        });

        // ========================= Toggle Dashbaord Menu Js End =====================

        // ========================= Dashbaord Header Dropdown Show & Hide Js Start =====================
        var profileElement = $(".dashboard-header__profile");
        var profileDropdownElement = $(".dashboard-header-dropdown");

        profileElement.on('click', function () {
            if ($(this).hasClass('show')) {
                $(this).removeClass('show');
            }
            else {
                $(this).addClass('show');
            }
            profileDropdownElement.slideToggle(300);
        });

        // ========================= Dashboard Header Dropdown Show & Hide Js End =====================

        // ========================= Dashboard Sidebar Show & Hide Js Start =====================
        $(".sidenav-bar__icon").on('click', function () {
            $('.dashboard-sidebar-menu').addClass('sidebar_show');
            $('.sidebar-overlay').addClass('show_overlay');
        });
        $(".dashboard-sidebar__close-icon, .sidebar-overlay").on('click', function () {
            $('.dashboard-sidebar-menu').removeClass('sidebar_show');
            $('.sidebar-overlay').removeClass('show_overlay');
        });
        // ========================= Dashboard Sidebar Show & Hide Js End =====================
    });
    // ==========================================
    //      End Document Ready function
    // ==========================================

    // ========================= Preloader Js Start =====================
    $(window).on("load", function () {
        $('.preloader').fadeOut();
    })
    // ========================= Preloader Js End=====================

    // ========================= Header Sticky Js Start =====================
    $(window).scroll(function () {
        if ($(window).scrollTop() >= 300) {
            $('.header-bottom').addClass('fixed-header');
        }
        else {
            $('.header-bottom').removeClass('fixed-header');
        }
    });
    // ========================= Header Sticky Js End=====================
    //================================= Scroll To Top Icon Js Start =========================
    var btn = $('.scroll-top');

    $(window).scroll(function () {
        if ($(window).scrollTop() > 300) {
            btn.addClass('show');
        } else {
            btn.removeClass('show');
        }
    });

    btn.on('click', function (e) {
        e.preventDefault();
        $('html, body').animate({ scrollTop: 0 }, '300');
    });

    //================================= Scroll To Top Icon Js End ===========================
    Array.from(document.querySelectorAll('table')).forEach(table => {
        let heading = table.querySelectorAll('thead tr th');
        Array.from(table.querySelectorAll('tbody tr')).forEach((row) => {
            Array.from(row.querySelectorAll('td')).forEach((colum, i) => {
                colum.setAttribute('data-label', heading[i].innerText)
            });
        });
    });

    let captcha = $('[name=captcha]').parents('.form-group');
    $('[name=captcha]').attr('placeholder', 'Enter the code');
    captcha.find('label').remove();

    $.each($('.modal'), function (i, element) {
        $(element).addClass('custom--modal');
    });

    $.each($('.form-check'), function (index, element) {
        if (!$(element).hasClass('form--check')) {
            $(element).addClass('form--check');
        }
    });

    $.each($('select'), function (index, element) {
        if (!$(element).hasClass('custom--select')) {
            $(element).addClass('custom--select')
        }
    });

    $('.showFilterBtn').on('click', function () {
        if ($('.responsive-filter-card').css('display') === 'block') {
            $('.responsive-filter-card').css({ display: 'none', transition: "0.3s linear" });
        } else {
            $('.responsive-filter-card').css({ display: 'block', transition: "0.3s linear" });
        }
    });

    $.each($('input, select, textarea'), function (i, element) {
        if (element.hasAttribute('required')) {
            $(element).siblings('label').not('.register-icon').addClass('required');
        }
    });

    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[title], [data-title], [data-bs-title]'))
    tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    });



    $(document).ready(function () {
        const $mainlangList = $(".langList");
        const $langBtn = $(".language-content");
        const $langListItem = $mainlangList.children();

        $langListItem.each(function () {
            const $innerItem = $(this);
            const $languageText = $innerItem.find(".language_text");
            const $languageFlag = $innerItem.find(".language_flag");

            $innerItem.on("click", function (e) {
                e.preventDefault();
                $langBtn.find(".language_text_select").text($languageText.text());
                $langBtn.find(".language_flag").html($languageFlag.html());
                var location = $innerItem.find('a').attr('href');
                window.location.href = location;
            });
        });
    });


    $('[name=captcha_secret]').parents('.mb-3').addClass('mb-4').removeClass('mb-3');

})(jQuery);
