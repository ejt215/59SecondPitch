
function displayStatistics(data) {
    var profile;
    for (i = 0; i < Object.keys(data).length; i++) {
        profile = data["" + i];
        $("body").append("<div class='panel panel-default businessCard'>" +
                "<div class='panel-heading'>" +
                "<h3 class='panel-title'>" + profile[0] + "</h3>" +
                "</div>" +
                "<div class='panel-body'>Matches: " + profile[1] + "<br />" +
                "No's: " + profile[2] +
                "</div>" +
                "</div>");
    }
}

$(document).ready(function () {
    //initialize sidebar
    $("ul#sidebar").sidebar({});

    //Grab investor contact info
    $.ajax({
        type: "POST",
        dataType: "json",
        async: false,
        url: "fetchEntrepreneurStatistics.php",
        //Set cover content to the 5 fetched profiles
        success: function (data) {
            displayStatistics(data);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert("Error: " + jqXHR.responseText);
        }
    });
});