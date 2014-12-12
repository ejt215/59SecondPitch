/* Name: entrepreneurHome
 * Authors: Maxwell Smith & Eric Thornton
 * Description:  Entrepreneur home page
 */
$(document).ready(function() {
    $("ul#sidebar").sidebar({});
    
    //Redirects to different page depending on button clicked
    $("#matchesBtn").click(function() {
        $(this).closest("form").attr("action", "browse.php");
    });
    $("#ideasBtn").click(function() {
        $(this).closest("form").attr("action", "entrepreneurIdeas.php");
    });
    $("#statisticsBtn").click(function() {
        $(this).closest("form").attr("action", "entrepreneurStatistics.php");
    });
    $("#manageBtn").click(function() {
        $(this).closest("form").attr("action", "manageProfile.php");
    });
});

