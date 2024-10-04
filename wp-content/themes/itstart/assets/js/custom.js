(function ($) {
    'use strict';

    $(document).ready(function() {
        /* =================================
              === 01. MENU NAVBAR ====
        =================================== */
			$(".menu-btn , .close-nav").on('click', function(){
				$('.menu-btn ').toggleClass("on");
			});
			
			jQuery(document).ready(function() {
			  jQuery('.sm').smartmenus({
				subMenusSubOffsetX: 1,
				subMenusSubOffsetY: -8
			  });
			});


        /* =================================
            === 02. HOME SEARCHBAR POPUP ====
        =================================== */
        var homeSearch = function() {
            var quikSearch = $("#quik-search-btn");
            var quikSearchRemove = $("#quik-search-remove");

            quikSearch.on('click',function() {
                $('.ds-quik-search').fadeIn(500).addClass('On');
            });

            quikSearchRemove.on('click',function() {
                $('.ds-quik-search').fadeOut(500).removeClass('On');
            });
        }
        homeSearch();

        /* =================================
              === 03. FAQ DROPDOWN ====
        =================================== */
        const questions = document.querySelectorAll(".clickon");
        questions.forEach(function(question){
            const btn = question.querySelector(".drop");
            btn.addEventListener("click", function () {
                questions.forEach(function (item) {
                    if (item !== question) {
                        item.classList.remove("show-text");
                    }
                });
                question.classList.toggle("show-text");
            });
        });

        /* =================================
              === 04. STICKY HEADER ====
        =================================== */
        $(window).scroll(function(){
            if ($(this).scrollTop() > 300) {
                $('.header-middle').addClass('fixed-header');
            } else {
                $('.header-middle').removeClass('fixed-header');
            }
        });

        /* =================================
              === 05 SCROLL UP ====
        =================================== */
        var btn = $('.ds-scroll');
        $(window).scroll(function() {
            if ($(window).scrollTop() > 500) {
                btn.addClass('show');
            } else {
                btn.removeClass('show');
            }
        });

        btn.on('click', function(e) {
            e.preventDefault();
            $('html, body').animate({scrollTop:0}, '500');
        });

        /* =================================
            === 07. SCROLL PROGRESSBAR ====
        =================================== */
        let scrollPercentage = () => {
            let scrollProgress = document.getElementById("backToTop");
            let progressValue = document.getElementById("progress-value");

            // Check if both elements exist
            if (scrollProgress && progressValue) {
                let pos = document.documentElement.scrollTop;
                let calcHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
                let scrollValue = Math.round(pos * 100 / calcHeight);

                scrollProgress.style.background = `conic-gradient(#FF3B2B ${scrollValue}%, #eee ${scrollValue}%)`;
                progressValue.textContent = scrollValue;
            }
        }

        // Ensure scrollPercentage runs only if necessary elements are present
        if (document.getElementById("backToTop") && document.getElementById("progress-value")) {
            window.onscroll = scrollPercentage;
        }

        /* =================================
            === 08. HOME SLIDER ====
        =================================== */
        function homeslider() {
            const Homemain = new Swiper('#ds-slider', {
                direction: 'horizontal',
                loop: true,
                autoplay: false,
                slidesPerView: 1,
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev'
                },
                breakpoints: {
                    640: {
                        slidesPerView: 1,
                        spaceBetween: 20,
                    },
                    768: {
                        slidesPerView: 1,
                        spaceBetween: 40,
                    },
                    1024: {
                        slidesPerView: 1,
                        spaceBetween: 40,
                    },
                }
            });
        }
        homeslider();

        /* =================================
            === 09. TESTIMONIAL SLIDER ====
        =================================== */
        function testimonialslider() {
            const Testimonialslider = new Swiper('#ds-testimonial', {
                direction: 'horizontal',
                loop: true,
                autoplay: true,
                spaceBetween: 10,
                speed: 1500,
                slidesPerView: 1,
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev'
                },
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                breakpoints: {
                    640: {
                        slidesPerView: 1,
                        spaceBetween: 10,
                    },
                    768: {
                        slidesPerView: 2,
                        spaceBetween: 20,
                    },
                    1024: {
                        slidesPerView: 3,
                        spaceBetween: 30,
                    },
                }
            });
        }
        testimonialslider();

        /* =================================
            === 10. TESTIMONIAL TWO SLIDER ====
        =================================== */
        function testimonialsliderTwo() {
            const Testimonialslider = new Swiper('#bs-testimonial-two', {
                direction: 'horizontal',
                loop: true,
                autoplay: true,
                spaceBetween: 30,
                speed: 500,
                slidesPerView: 1,
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev'
                },
                breakpoints: {
                    640: {
                        slidesPerView: 1,
                        spaceBetween: 20,
                    },
                    768: {
                        slidesPerView: 2,
                        spaceBetween: 30,
                    },
                    1024: {
                        slidesPerView: 2,
                        spaceBetween: 30,
                    },
                }
            });
        }
        testimonialsliderTwo();

        /* =================================
            === 11. CLIENTS SLIDER ====
        =================================== */
        function clientslider() {
            const Clientslider = new Swiper('.bs-client', {
                direction: 'horizontal',
                loop: true,
                autoplay: true,
                slidesPerView: 2,
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev'
                },
                breakpoints: {
                    640: {
                        slidesPerView: 3,
                        spaceBetween: 0,
                    },
                    768: {
                        slidesPerView: 3,
                        spaceBetween: 10,
                    },
                    1024: {
                        slidesPerView: 5,
                        spaceBetween: 30,
                    },
                }
            });
        }
        clientslider();

        /* =================================
          === 12. COUNTER UP ====
        =================================== */
        function counterUp() {
            $('.counter').counterUp({
                delay: 10,
                time: 1000
            });
        }
        counterUp();

    });

    /* =================================
        === 06. PRELOADER ====
    =================================== */
    $(window).on('load', function() {
        setTimeout(function(){		
            $('#preloader').fadeOut(500);
            $('#loader').addClass('show');
        }, 1000);
    });

})(jQuery);