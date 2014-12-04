/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
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
        if (profile["contact_type"]==="Phone") {
            /*$("body").append("<div class='panel panel-default businessCard'>" +
                    "<div class='panel-heading'>" +
                    "<h3 class='panel-title'>" + profile["firstname"] + " " + profile["lastname"] + "</h3>" +
                    "</div>" +
                    "<div class='panel-body'>" + profile["contact_type"] + ": " + profile[3] + "<br />" +
                    "Contact Preferences: " + profile["contact_preferences"] +
                    "</div>" +
                    "</div>");*/
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
            /*$("body").append("<div class='panel panel-default businessCard'>" +
                    "<div class='panel-heading'>" +
                    "<h3 class='panel-title'>" + profile["firstname"] + " " + profile["lastname"] + "</h3>" +
                    "</div>" +
                    "<div class='panel-body'>Phone: " + profile['phone'] + "<br>Email: " + profile['email'] + "<br />" +
                    "Contact Preferences: " + profile["contact_preferences"] +
                    "</div>" +
                    "</div>");*/
            
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
        /*else{
            alert("entrepreneurMatches::profile length incorrect.  Length: " + Object.keys(profile).length);
            alert(JSON.stringify(profile));
        }*/
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


