/* Name: entrepreneurMatches
 * Authors: Maxwell Smith & Eric Thornton
 * Description:  Allows entrepreneurs to view contact information of investors that matched with one of their ventures
 */

function displayIdeas(data) {
    var profile;
    var pic;
    for (i = 0; i < Object.keys(data).length; i++) {
        profile = data["" + i];
      
        if(profile["profilepicture"]===null){
            pic="IMG/default.png";
        }
        else{
            pic = "PROFILE_PICTURES/"+profile["profilepicture"];
        }
        //Display investor contact information based on their preferences
        if (profile["contact_type"]==="Phone") {
             $("body").append('<div class="flip-container">'+
        '<div class="flipper">'+
            '<div class="front">'+
                '<img src="'+pic+'" />'+
                '<p>'+profile["firstname"]+' '+profile["lastname"]+'/p>'+
                '<div class="sub">'+
                    '<p>'+profile["class"]+'</p>'+
                '</div>'+
            '</div>'+
            '<div class="back">'+
                '<p id="titulo">'+profile["firstname"]+' '+profile["lastname"]+'</p>'+
                '<p>'+profile["class"]+'</p>'+
                '<p>Location: '+profile["city"]+'</p>'+
                '<p>Age:'+profile["age"]+'</p>'+
                '<p>Alma Mater:'+profile["almamter"]+'</p>'+
                '<p>'+profile["phone"]+'</p>'+
                '<p>Contact Preferences:'+profile["contact_preferences"]+'</p>'+
            '</div>'+
        '</div>'+
    '</div>');
            
        } else if(profile["contact_type"]==="Email"){
            $("body").append('<div class="flip-container">'+
        '<div class="flipper">'+
            '<div class="front">'+
                '<img src="'+pic+'" />'+
                '<p>'+profile["firstname"]+' '+profile["lastname"]+'</p>'+
                '<div class="sub">'+
                    '<p>'+profile["class"]+'</p>'+
                '</div>'+
            '</div>'+
            '<div class="back">'+
                '<p id="titulo">'+profile["firstname"]+' '+profile["lastname"]+'</p>'+
                '<p>'+profile["class"]+'</p>'+
                '<p>Location: '+profile["city"]+'</p>'+
                '<p>Age:'+profile["age"]+'</p>'+
                '<p>'+profile["email"]+'</p>'+
                
                '<p>Contact Preferences:'+profile["contact_preferences"]+'</p>'+
            '</div>'+
        '</div>'+
    '</div>');
        }
        else  {
            $("body").append('<div class="flip-container">'+
        '<div class="flipper">'+
            '<div class="front">'+
                '<img src="'+pic+'"/>'+
                '<p>'+profile["firstname"]+' '+profile["lastname"]+'</p>'+
                '<div class="sub">'+
                    '<p>'+profile["class"]+'</p>'+
                '</div>'+
            '</div>'+
            '<div class="back">'+
                '<p id="titulo">'+profile["firstname"]+' '+profile["lastname"]+'</p>'+
                '<p>'+profile["class"]+'</p>'+
                '<p>Location: '+profile["city"]+'</p>'+
                '<p>Age:'+profile["age"]+'</p>'+
                '<p>'+profile["email"]+'</p>'+
                '<p>'+profile["phone"]+'</p>'+
                '<p>Contact Preferences:'+profile["contact_preferences"]+'</p>'+
            '</div>'+
        '</div>'+
    '</div>');
        }
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
        url: "fetchInvestorContactInfo.php",
        //Set cover content to the 5 fetched profiles
        success: function (data) {
            displayIdeas(data);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert("Error: " + jqXHR.responseText);
        }
    });
});


