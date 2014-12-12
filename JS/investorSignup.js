/* Name: investorSignup
 * Authors: Maxwell Smith & Eric Thornton
 * Description:  Allows investors to add contact preferences at signup
 */
$(document).ready(function() {
    $("input[name='contacttype']").click(function() {
        checkedID = $(this).attr("id");
        //Display phone number field based on investor contact preferences
        if (checkedID == "phoneRadio" || checkedID == "eitherRadio") {
            $("#phoneNumber").css("visibility", "visible");
        } else {
            $("#phoneNumber").css("visibility", "hidden");
        }
    });
});
