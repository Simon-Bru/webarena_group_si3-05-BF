$( document ).ready(function() {
    $('[data-toggle="tooltip"]').tooltip({
        html: true
    });
    $('[data-toggle="popover"]').popover({
        html: true
    });

    // Disabling submit button after submit to prevent multiple sent of form
    $('form').submit(function() {
        $(this).find(".btn").prop('disabled',true);
    });
});