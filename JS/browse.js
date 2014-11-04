/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function displayNewProfiles(data) {
    var profile;
    for (i = 1; i < 6; i++) {
        profile = data["" + i];

        $("#" + i).html(
                "<h1> " + profile["business_name"] + "</h1><br />" +
                "Business type: " + profile["business_type"] + "<br />" +
                "Creator: " + profile["firstname"] + " " + profile["lastname"] + "<br />" +
                "Almamater: " + profile['almamater'] + "<br />" +
                "Location: " + +profile['city'] + "<br />" +
                "Description :" + profile['business_description'] + "<br />" +
                "<button type='button' class='viewProfile' id='b" + i + "'>View Full Profile</button>"
                );
    }
}

$(document).ready(function() {
    //initialize sidebar
    $("ul#demo_menu1").sidebar({});

    //initialize coverflow
    $('.coverflow').coverflow({
        index: 6,
        density: 2,
        innerOffset: 50,
        innerScale: .7
    });

    $('.viewProfile').click(function() {
        $('#profileContainer').hide();
    });

    //Grab 5 profiles to start
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "fetchProfile.php",
        //Set cover content to the 5 fetched profiles
        success: function(data) {
            displayNewProfiles(data);
        }
    });

    //Next fetches 5 random profiles to display 
    $("#next").click(function() {
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "fetchProfile.php",
            
            //Set cover content to the 5 fetched profiles
            success: function(data) {
                displayNewProfiles(data);
            }
        });
    });
});




