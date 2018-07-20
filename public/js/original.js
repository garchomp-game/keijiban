$(function() {
    $('.original-gallery-radio-check').click(function() {
        $val = $(this).find("input").val();
        $("#content-set").empty();
        if ($val == "image") {
            $("#content-set")
            .append('<input type="file" name="content_description" value="">');
        } else if ($val == 'text') {
            $("#content-set")
            .append('<textarea placeholder="本文" class="form-control" name="content_description" rows="8" cols="80"></textarea>');
        }
    });
});
