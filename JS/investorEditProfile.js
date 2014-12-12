/* Name: investorEditProfile
 * Authors: Maxwell Smith & Eric Thornton
 * Description: Allows an investor to change his/her contact preferences
 */
$(document).ready(function() {
    $("input[name='contacttype']").click(function() {
        checkedID = $(this).attr("id");
        //Hide or show phone number field
        if (checkedID == "phoneRadio" || checkedID == "eitherRadio") {
            $("#phoneNumber").css("visibility", "visible");
        } else {
            $("#phoneNumber").css("visibility", "hidden");
        }
    });
});
