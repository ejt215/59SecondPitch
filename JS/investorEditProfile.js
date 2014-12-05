$(document).ready(function() {
    $("input[name='contacttype']").click(function() {
        checkedID = $(this).attr("id");
        if (checkedID == "phoneRadio" || checkedID == "eitherRadio") {
            $("#phoneNumber").css("visibility", "visible");
        } else {
            $("#phoneNumber").css("visibility", "hidden");
        }
    });
});
