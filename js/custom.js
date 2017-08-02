/* All common custom scripting codes should come here */

/* Delaration of all functions */

/*Add/remove class on scroll*/
var fixScrollNav = function (options) {
    // Target declaration
    var target = options.target;

    // offset and offsetHeight declaration
    var offset = options.offset;
    var offsetHeight = 0;
    if (isNaN(offset)) {
        offsetHeight = $(offset).outerHeight();
    } else {
        offsetHeight = offset;
    }

    if ($(window).scrollTop() > offsetHeight) {
        $(target).addClass("scrollFixed");
    } else {
        $(target).removeClass("scrollFixed");
    }
};

/*Add/remove class of list*/
var listClassToggle = function (options) {
    // Target declaration
    var target = options.target;
    // Class name declaration
    var className = options.class;

    $(target).find('a').click(function () {
        $(target).find('li').removeClass(className);
        $(this).closest('li').addClass(className);
    });

};

var smoothScroll = function (options) {
    var target = options.target;
    var delay = options.delay;

    // offset and offsetHeight declaration
    var offset = options.offset;
    var offsetHeight = 0;
    if (isNaN(offset)) {
        offsetHeight = $(offset).outerHeight();
    } else {
        offsetHeight = offset;
    }

    $(target).find('a').click(function () {
        var scrollDiv = $(this).attr('data-target');
        $('html, body').animate({
            scrollTop: $(scrollDiv).offset().top - offsetHeight
        }, delay);
    });
};

/* Initiation of function on document ready */
$(document).ready(function () {
    // Toggle class of list element
    listClassToggle({
        target: '.scroll-nav',
        class: 'active'
    });

    smoothScroll({
        target: '.scroll-nav',
        delay: 1000,
        offset: 50
    });
});

/* Initiation of function on window load */
$(window).load(function () {

});

/* Initiation of function on window scroll */
$(window).scroll(function () {
    // Add class on scroll
    fixScrollNav({
        target: '.scroll-nav',
        offset: '#hero-section'
    });
});
