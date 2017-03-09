$("a#circle-button").click(function() {
    $('html, body').animate({
        scrollTop: $("section#content").offset().top
    }, 1200);
    return false;
});

$('.accroche-enfant .red-box').css("height", $('.accroche-enfant .yellow-box').offset.top);

initScrollAnimation();

// Tarifs Animation

$(".block-forfait label").hover(function () {
    $(this).addClass("animated swing").delay( 800 );
}, function() {
    tmo = setTimeout(function() {
        $(".block-forfait label").removeClass("animated swing");
    }, 5000);
}, function () {
    clearTimeout(tmo);
});

// Menu Hamburger

$( ".cross" ).hide();
$( ".menu" ).hide();
$( ".hamburger" ).click(function() {
    $( ".menu" ).slideToggle( "slow", function() {
        $( ".hamburger" ).hide();
        $( ".cross" ).show();
    });
});

$( ".cross" ).click(function() {
    $( ".menu" ).slideToggle( "slow", function() {
        $( ".cross" ).hide();
        $( ".hamburger" ).show();
    });
});

$(function() {
    $('a[href*="#"]:not([href="#"])').click(function() {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
            if (target.length) {
                $('html, body').animate({
                    scrollTop: target.offset().top
                }, 1000);
                return false;
            }
        }
    });
});

var map;
function initialize() {
    var mapOptions = {
        zoom: 10,
        center: new google.maps.LatLng(43.7548686,3.5604287),
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        scrollwheel: false,
        scroll:{x:$(window).scrollLeft(),y:$(window).scrollTop()}
    };
    map = new google.maps.Map(document.getElementById('map_canvas'),
        mapOptions);
    new google.maps.Marker({map:map,position:map.getCenter()});
    var offset=$(map.getDiv()).offset();
    map.panBy(((mapOptions.scroll.x-offset.left)/3),((mapOptions.scroll.y-offset.top)/3));
    google.maps.event.addDomListener(window, 'scroll', function(){
        var scrollY=$(window).scrollTop(),
            scrollX=$(window).scrollLeft(),
            scroll=map.get('scroll');
        if(scroll){
            map.panBy(-((scroll.x-scrollX)/2),-((scroll.y-scrollY)/2));
        }
        map.set('scroll',{x:scrollX,y:scrollY})

    });
}

google.maps.event.addDomListener(window, 'load', initialize);

function initScrollAnimation () {

    var introBlock = $('.intro-block');
    var tyroBlock = $('.tyro');

    $.jScrollability([
        {
            'selector': '.img-accrobranche',
            'start': introBlock.offset().top + 200,
            'trigger': true,
            'duration': 1000,
            'fn': function($el,pcnt) {
                $el.css("visibility", "visible");
                $el.addClass('animated fadeInLeftBig');
            }
        },
        {
            'selector': '.text-image-oc',
            'start': introBlock.offset().top + 300,
            'trigger': true,
            'duration': 3000,
            'fn': function($el,pcnt) {
                $el.css("visibility", "visible");
                $el.addClass('animated fadeInUp');
            }
        },
        {
            'selector': '.accrobranche-logo',
            'start': introBlock.offset().top + 400,
            'trigger': true,
            'duration': 3000,
            'fn': function($el,pcnt) {
                $el.css("visibility", "visible");
                $el.addClass('animated fadeInLeft');
            }
        },
        {
            'selector': '.accroche-hauteur .text',
            'start': introBlock.offset().top + 600,
            'trigger': true,
            'duration': 3000,
            'fn': function($el,pcnt) {
                $el.css("visibility", "visible");
                $el.addClass('animated rubberBand');
            }
        },
        {
            'selector': '.menu-burger',
            'start': introBlock.offset().top + 800,
            'trigger': true,
            'duration': 3000,
            'fn': function($el, pcnt) {
                txtLeft = $('.section-txt-parcours .enfant');
                txtRight = $('.section-txt-parcours .adulte');

                $('.menu-burger').css("visibility", "visible");
                $('.menu-burger').addClass('animated bounceInLeft');

            }
        },
        {
            'selector': '.accroche-enfant .text',
            'start': $('.tyro').offset().top + 300,
            'trigger': true,
            'duration': 3000,
            'fn': function($el,pcnt) {
                $el.css("visibility", "visible");
                $el.addClass('animated rubberBand');
            }
        },
        {
            'selector': '.section-txt-parcours',
            'start': $('.section-txt-parcours').offset().top + 200,
            'trigger': true,
            'duration': 3000,
            'fn': function($el, pcnt) {
                txtLeft = $('.section-txt-parcours .enfant');
                txtRight = $('.section-txt-parcours .adulte');

                $('.section-txt-parcours .col-md-12').css("visibility", "visible");
                $('.section-txt-parcours .col-md-12').addClass('animated bounceInUp');

            }
        },
        {
            'selector': '.accroche-laser .intro-text',
            'start': $('.block-img-laser').offset().top + 300,
            'trigger': true,
            'duration': 3000,
            'fn': function($el, pcnt) {
                $el.css("visibility", "visible");
                $el.addClass('magictime bounceInUp');
            }
        },
        {
            'selector': '#nb-equipement',
            'start': $('.block-img-laser').offset().top + 450,
            'trigger': true,
            'duration': 1000,
            'fn': function($el, pcnt) {
                $el.css("visibility", "visible");
                $el.addClass('magictime tinLeftIn');

                var hauteur = new CountUp('nb-equipement', 0, 10, 0, 1);
                hauteur.start(function () {
                    txtEquipement= $('.block-img-laser .info-equipement');
                    txtEquipement.css("visibility", "visible");
                    txtEquipement.addClass('magictime vanishIn');
                })
            }
        },
        {
            'selector': '#nb-tyro',
            'start': tyroBlock.offset().top + 100,
            'trigger': true,
            'duration': 1000,
            'fn': function($el,pcnt) {
                $el.css("visibility", "visible");
                $el.addClass('animated bounceInDown');
                var nbTyro = new CountUp('nb-tyro', 0, 3, 0, 1);
                nbTyro.start(function () {
                    txt = $('.block-nb-tyro .text');
                    txt.css("visibility", "visible");
                    txt.addClass('animated zoomIn');
                    equal = $('#equal');
                    equal.css("visibility", "visible");
                    equal.addClass('animated tada');

                    distance = $('#distance');
                    distance.css("visibility", "visible");
                    distance.addClass('animated bounceInDown');

                    var distance = new CountUp('distance', 0, 700);
                    distance.start(function () {
                        txtDistance = $('.block-distance .text');
                        txtDistance.css("visibility", "visible");
                        txtDistance.addClass('animated zoomIn');

                        plus = $('#plus');
                        setTimeout(function(){
                            plus.css("visibility", "visible");
                            plus.addClass('animated tada');
                        }, 600);

                        hauteur = $('#hauteur');
                        hauteur.css("visibility", "visible");
                        hauteur.addClass('animated bounceInDown');

                        var hauteur = new CountUp('hauteur', 0, 30);
                        hauteur.start(function () {
                            txtHauteur = $('.block-hauteur .text');
                            txtHauteur.css("visibility", "visible");
                            txtHauteur.addClass('animated zoomIn');
                        })

                    });
                });
                
            }
        }
    ]);
};