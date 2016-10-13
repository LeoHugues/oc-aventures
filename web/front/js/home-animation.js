$("a#circle-button").click(function() {
    $('html, body').animate({
        scrollTop: $("section#content").offset().top
    }, 1200);
    return false;
});

$('.accroche-enfant .red-box').css("height", $('.accroche-enfant .yellow-box').offset.top);

initScrollAnimation();

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
                $el.addClass('magictime spaceInUp');
            }
        },
        {
            'selector': '.text-image-oc',
            'start': introBlock.offset().top + 300,
            'trigger': true,
            'duration': 3000,
            'fn': function($el,pcnt) {
                $el.css("visibility", "visible");
                $el.addClass('magictime tinLeftIn');
            }
        },
        {
            'selector': '.accrobranche-logo',
            'start': introBlock.offset().top + 400,
            'trigger': true,
            'duration': 3000,
            'fn': function($el,pcnt) {
                $el.css("visibility", "visible");
                $el.addClass('magictime slideLeftReturn');
            }
        },
        {
            'selector': '.accroche-hauteur .text',
            'start': introBlock.offset().top + 600,
            'trigger': true,
            'duration': 3000,
            'fn': function($el,pcnt) {
                $el.css("visibility", "visible");
                $el.addClass('magictime vanishIn');
            }
        },
        {
            'selector': '.accroche-enfant .text',
            'start': $('.tyro').offset().top + 300,
            'trigger': true,
            'duration': 3000,
            'fn': function($el,pcnt) {
                $el.css("visibility", "visible");
                $el.addClass('magictime vanishIn');
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
                $('.section-txt-parcours .col-md-12').addClass('magictime slideDownReturn');

            }
        },
        {
            'selector': '#nb-tyro',
            'start': tyroBlock.offset().top + 100,
            'trigger': true,
            'duration': 1000,
            'fn': function($el,pcnt) {
                $el.css("visibility", "visible");
                $el.addClass('magictime twisterInUp');
                var nbTyro = new CountUp('nb-tyro', 0, 3, 0, 1);
                nbTyro.start(function () {
                    txt = $('.block-nb-tyro .text');
                    txt.css("visibility", "visible");
                    txt.addClass('magictime vanishIn');
                    equal = $('#equal');
                    equal.css("visibility", "visible");
                    equal.addClass('magictime tinRightIn');

                    distance = $('#distance');
                    distance.css("visibility", "visible");
                    distance.addClass('magictime twisterInUp');

                    var distance = new CountUp('distance', 0, 700);
                    distance.start(function () {
                        txtDistance = $('.block-distance .text');
                        txtDistance.css("visibility", "visible");
                        txtDistance.addClass('magictime vanishIn');

                        plus = $('#plus');
                        setTimeout(function(){
                            plus.css("visibility", "visible");
                            plus.addClass('magictime foolishIn');
                        }, 600);

                        hauteur = $('#hauteur');
                        hauteur.css("visibility", "visible");
                        hauteur.addClass('magictime twisterInUp');

                        var hauteur = new CountUp('hauteur', 0, 30);
                        hauteur.start(function () {
                            txtHauteur = $('.block-hauteur .text');
                            txtHauteur.css("visibility", "visible");
                            txtHauteur.addClass('magictime vanishIn');
                        })

                    });
                });
                
            }
        }
    ]);
};