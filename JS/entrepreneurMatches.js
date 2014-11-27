/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function displayIdeas(data) {
    var profile;
    for (i = 0; i < Object.keys(data).length; i++) {
        profile = data["" + i];
        $("body").append("<div class='panel panel-default businessCard'>" +
            "<div class='panel-heading'>" +
            "<h3 class='panel-title'>" + profile["firstname"] + " " + profile["lastname"] + "</h3>" +
            "</div>" +
            "<div class='panel-body'>" + profile["contact_type"] + ": " + profile[3] + "<br />" +
            "Contact Preferences: " + profile["contact_preferences"] +
            "</div>" +
            "</div>");
    }
}

$(document).ready(function() {
    //initialize sidebar
    $("ul#sidebar").sidebar({});

    //Grab investor contact info
    $.ajax({
        type: "POST",
        dataType: "json",
        async:false,
        url: "fetchInvestorContactInfo.php",
        //Set cover content to the 5 fetched profiles
        success: function(data) {
            displayIdeas(data);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert("Error: " + jqXHR.responseText);
        }
    });
});


