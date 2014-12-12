/* Name: investorHome
 * Authors: Maxwell Smith & Eric Thornton
 * Description: Investor home page
 */
$(document).ready(function() {
    $("ul#sidebar").sidebar({});
    
    //Redirects to different page depending on button clicked
    $("#browseBtn").click(function() {
        $(this).closest("form").attr("action", "browse.php");
    });
    $("#trackingBtn").click(function() {
        $(this).closest("form").attr("action", "investorTracking.php");
    });
    $("#favoritesBtn").click(function() {
        $(this).closest("form").attr("action", "investorFavorites.php");
    });
    $("#manageBtn").click(function() {
        $(this).closest("form").attr("action", "manageProfile.php");
    });
});

