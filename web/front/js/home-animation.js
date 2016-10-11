$("a#circle-button").click(function() {
    $('html, body').animate({
        scrollTop: $("section#content").offset().top
    }, 1200);
    return false;
});

$('.img-accrobranche').hide();
$('.text-image-oc').hide();

$.jScrollability([
    {
        'selector': '.text-image-oc',
        'start': 1200,
        'trigger': true,
        'duration': 1000,
        'fn': function($el,pcnt) {
            $el.show();
            $el.addClass('magictime tinLeftIn');
        }
    }
]);

$.jScrollability([
    {
        'selector': '.img-accrobranche',
        'start': 1300,
        'trigger': true,
        'duration': 3000,
        'fn': function($el,pcnt) {
            $el.show();
            $el.addClass('magictime spaceInUp');
        }
    }
]);