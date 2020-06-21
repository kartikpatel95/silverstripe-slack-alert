(function ($) {
    // onload execute
    setSpacerHeight();

    // resize alert on window resize
    $(window).on('resize', function () {
        setSpacerHeight();
    });

    // close on click
    $('.dismiss-alert').on('click touch', function () {
        sessionStorage.setItem("alert-status", 'closed');
        $('body').css('margin-top', 0);
    });

    // adds extra margin to top
    function setSpacerHeight()
    {
        var closed = sessionStorage.getItem("alert-status");
        if (closed === 'closed') {
            $('.emergency-alert').remove();
        } else {
            let emergencyAlert = $('.emergency-alert.show');
            let alertHeight = emergencyAlert.height();
            $('body').css('margin-top', alertHeight);
        }
    }
})(jQuery);


