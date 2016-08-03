$(document).ready(function () {
    eventos();
});

function eventos() {
    $('.toggle').on('click', function () {
        $('.container').stop().addClass('active');
    });

    $('.close').on('click', function () {
        $('.container').stop().removeClass('active');
    });


    $('.button').click(function (e) {
        e.preventDefault();
        $(this).parent().toggleClass('expand');
        $(this).parent().children().toggleClass('expand');
    });

    addEventListener("load", function () {
        setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
        window.scrollTo(0, 1);
    }

}