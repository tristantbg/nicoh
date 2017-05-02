/* globals $:false */
var width = $(window).width(),
    height = $(window).height(),
    slidecaption,
    prevslidecaption = '',
    isMobile = false,
    $root = '/';
$(function() {
    var app = {
        init: function() {
            $(window).resize(function(event) {
                app.sizeSet();
            });
            $(document).ready(function($) {
                $body = $('body');
                $contact = $('#contact');
                app.sizeSet();
                // History.Adapter.bind(window, 'statechange', function() {
                //     var State = History.getState();
                //     console.log(State);
                //     var content = State.data;
                //     if (content.type == 'project') {
                //         $body.addClass('project loading');
                //         app.loadContent(State.url + '/ajax', slidecontainer);
                //     }
                // });
                $('[data-target="contact"]').click(function(event) {
                    var section = $('.fp-section.active');
                    if ($contact.is(':visible')) {
                        $('#contact').slideUp(400);
                        $('.fp-section.active .fp-tableCell, .fp-section.active .section-marquee').css('transform', 'none');
                    } else {
                        $('#contact').slideDown(400);
                        offset = ((isMobile) ? '3rem' : '8rem');
                        if (section.hasClass('image-section')) {
                            section.find('.section-marquee').css('transform', 'translateY(' + offset + ') translateZ(0)');
                        } else {
                            section.find('.fp-tableCell').css('transform', 'translateY(' + offset + ') translateZ(0)');
                        }
                    }
                });
                $('[data-target="nav-next"]').click(function(event) {
                    var $slider = $(this).parents('.slider');
                    app.goNext($slider);
                });
                $('[data-target="nav-prev"]').click(function(event) {
                    var $slider = $(this).parents('.slider');
                    app.goPrev($slider);
                });
                $('[data-target="nav-first"]').click(function(event) {
                    var $slider = $(this).parents('.slider');
                    $slider.flickity('select', 1);
                });
                $(document).keyup(function(e) {
                    //esc
                    if (e.keyCode === 27) app.goIndex();
                    //left
                    if (e.keyCode === 37 && $slider) app.goPrev($slider);
                    //right
                    if (e.keyCode === 39 && $slider) app.goNext($slider);
                });
                $(window).load(function() {
                    app.loadSliders();
                    setTimeout(function() {
                        $(".loader").fadeOut("fast");
                    }, 500);
                });
            });
        },
        sizeSet: function() {
            width = $(window).width();
            height = $(window).height();
            if (width <= 770 || Modernizr.touch) isMobile = true;
            if (isMobile) {
                if (width >= 770) {
                    //location.reload();
                    isMobile = false;
                }
            }
        },
        loadSliders: function() {
            $('.slider').each(function(index, el) {
                var $slider = $(this);
                var initIndex = Math.floor(Math.random() * this.children.length);
                var colors = $slider.attr('data-colors');
                if (colors) {
                    $slider.colorIndex = Math.floor(Math.random() * colors.length);
                    colors = colors.split(",");
                    selectColor();
                }
                if ($slider.attr('data-random') != 'true') {
                    initIndex = 1;
                }
                $slider.flickity({
                    cellSelector: '.cell',
                    imagesLoaded: false,
                    lazyLoad: 2,
                    bgLazyLoad: 2,
                    setGallerySize: false,
                    accessibility: false,
                    wrapAround: true,
                    prevNextButtons: false,
                    pageDots: false,
                    draggable: true,
                    dragThreshold: 50,
                    initialIndex: initIndex
                });
                setTimeout(function() {
                    $slider.flickity('resize');
                }, 300);
                $slider.on('select.flickity', function() {
                    var flkty = $(this).data('flickity');
                    if (flkty) {
                        slidecaption = $(flkty.selectedElement).attr('data-title');
                        if (typeof slidecaption !== typeof undefined && slidecaption !== false && slidecaption != prevslidecaption) {
                            $(this).parent().find('.section-marquee').html('<div class="marquee" data-speed="40" data-pausable="true">' + slidecaption + '</div>');
                            Marquee3k({
                                selector: '.marquee:not(.is-ready)',
                            });
                            prevslidecaption = slidecaption;
                        }
                        if (!isMobile && $(this).is('#main-slider')) {
                            var mainwidth = $(flkty.selectedElement).find('.inner-content img').width();
                            $('.size-sync').width(mainwidth);
                            $('.section-nav').width(width - mainwidth - 90);
                        }
                        selectColor();
                    }
                });

                function selectColor() {
                    if (colors && colors.length > 0) {
                        color = colors[$slider.colorIndex];
                        $parent = $slider.parents('section');
                        $parent.css('background', color);
                        $parent.find('.inner-content').css('background', color);
                        $slider.colorIndex = ($slider.colorIndex + 1) % colors.length;
                    }
                }
                // if ($(this).is('#main-slider')) {
                //     var flkty = $(this).data('flickity');
                //     $slider.on('settle.flickity', function() {
                //       var mainwidth = $(flkty.selectedElement).find('.inner-content img').width();
                //       $('.size-sync').width(mainwidth);
                //       $('.section-nav').width(width - mainwidth - 90);
                //     });
                // }
            });
            $fullpage = $('#container').fullpage({
                //Navigation
                lockAnchors: false,
                //anchors: ['work'],
                fixedElements: 'header',
                normalScrollElements: '.scroller',
                navigation: false,
                //Scrolling
                css3: true,
                scrollingSpeed: 700,
                autoScrolling: true,
                fitToSection: true,
                fitToSectionDelay: 700,
                scrollBar: false,
                easing: 'easeInOutCubic',
                easingcss3: 'ease',
                loopHorizontal: false,
                continuousVertical: true,
                continuousHorizontal: false,
                bigSectionsDestination: 'top',
                //Design
                //paddingTop: '7.5rem',
                //paddingBottom: '3rem',
                controlArrows: false,
                //Custom selectors
                sectionSelector: 'section',
                lazyLoading: false,
                //events
                onLeave: function(index, nextIndex, direction) {
                    if ($contact.is(':visible')) {
                        $('#contact').slideUp(400);
                        $('.fp-section.active .fp-tableCell').css('transform', 'none');
                    }
                },
                afterLoad: function(anchorLink, index) {},
                afterRender: function() {},
                afterResize: function() {},
                afterResponsive: function(isResponsive) {},
                afterSlideLoad: function(anchorLink, index, slideAnchor, slideIndex) {},
                onSlideLeave: function(anchorLink, index, slideIndex, direction, nextSlideIndex) {}
            });
            $('.scroller').slimScroll({
                height: 'auto',
                size: '3px',
                position: 'left',
                color: '#000',
                alwaysVisible: true,
                distance: '-15px',
                railVisible: false,
                railOpacity: 0,
                wheelStep: ((isMobile) ? 50 : 10),
                allowPageScroll: false,
                disableFadeOut: true
            });
        },
        goNext: function($slider) {
            $slider.flickity('next', false);
        },
        goPrev: function($slider) {
            $slider.flickity('previous', false);
        },
        goIndex: function() {
            History.pushState({
                type: 'index'
            }, $sitetitle, window.location.origin + $root);
        },
        loadContent: function(url, target) {
            $.ajax({
                url: url,
                success: function(data) {
                    $(target).html(data);
                }
            });
        }
    };
    app.init();
});