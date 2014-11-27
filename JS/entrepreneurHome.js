$(document).ready(function() {
    $("ul#sidebar").sidebar({});
    
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

