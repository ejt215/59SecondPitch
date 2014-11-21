/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function displayIdeas(data) {
    var profile;
    for (i = 1; i < 6; i++) {
        profile = data["" + i];
        alert(profile);
        $("#" + i).html(
                "<form action='entrepreneurEditProfile.php' method='POST'> " +
                "<h1>" + profile["business_name"] + "</h1><br />" +
                "<b>Business type</b>: " + profile["business_type"] + "<br />" +
                "<b>Description</b> :" + profile['business_description'] + "<br />" +
                "<button type='submit' class='editProfile' id='b" + i + "'>Edit</button>" +
                "<input type='hidden' name='business_name' value='" + profile["business_name"] + "'>" +
                "<input type='hidden' name='business_type' value='" + profile["business_type"] + "'>" +
                "<input type='hidden' name='business_id' value='" + profile["business_id"] + "'>" +
                "<input type='hidden' name='business_description' value='" + profile["business_description"] + "'>" +
                "</form>"
                );
        $("#" + i).attr("name", profile['business_id']);

    }
}

$(document).ready(function() {
    
    //initialize sidebar
    $("ul#demo_menu1").sidebar({});

    //initialize coverflow
    $('.coverflow').coverflow({
        index: 3,
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
        url: "fetchEntrepreneurProfiles.php",
        //Set cover content to the 5 fetched profiles
        success: function(data) {
            displayIdeas(data);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert("Error: " + jqXHR.responseText);
        }
    });

    $("#newIdea").click(function() {
        window.location="entrepreneurSignup.php";
    });
    $("#deleteIdea").click(function() {
        var id = $('.coverflow').coverflow("cover").attr('name');
        $(id).remove();
    });
});