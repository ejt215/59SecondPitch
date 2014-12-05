
function displayStatistics(data) {
    var profile;
    var feedback1="";
    var feedback2="";
    
    for (i = 0; i < Object.keys(data).length; i++) {
        profile = data["" + i];
        
        $("body").append('<div class="flip-container">'+
        '<div class="flipper">'+
            '<div class="front">'+
                
                '<p><h1>'+profile[0]+'</h1></p>'+
                '<div class="sub">'+
                    
                '</div>'+
            '</div>'+
            '<div class="back">'+
                
                '<p><span style="color:green; font-weight:bold;">Matches:   </span>'+ profile[1]+'</p>'+
                "<p><span style='color:red; font-weight:bold;'>No's:   </span>" + profile[2] + '</p><br><br>'+ 
                "<h3>Feedback: </h3>"+"<br />"+
                '<p>'+profile[3]+'</p>'+
                '<p>'+profile[4]+'</p>'+
                
                
            '</div>'+
        '</div>'+
    '</div>');
    }
}
 /*$("body").append("<div class='panel panel-default businessCard'>" +
                "<div class='panel-heading'>" +
                "<h3 class='panel-title'>" + profile[0] + "</h3>" +
                "</div>" +
                "<div class='panel-body'>Matches: " + profile[1] + "<br />" +
                "No's: " + profile[2] +"<br />"+
                "Feedback: "+"<br />"+
                profile[3]+"<br />"+
                profile[4]+"<br />"+
                "</div>" +
                "</div>");*/

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