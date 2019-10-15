$(document).ready(function() {
    var maxLength = 2000;
    $('textarea').keyup(function() {
        var length = $(this).val().length;
        var length = maxLength - length;
        $('#chars').text(length);
    });
})