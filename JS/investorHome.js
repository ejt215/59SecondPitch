$(document).ready(function() {
    $("ul#sidebar").sidebar({});
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

