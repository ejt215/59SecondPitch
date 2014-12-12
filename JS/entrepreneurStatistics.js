 /*Name: entrepreneurStatistics
 * Authors: Maxwell Smith & Eric Thornton
 * Description:  Displays statistics for all of an entrepreneur's ventures
 */


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

$(document).ready(function () {
    //initialize sidebar
    $("ul#sidebar").sidebar({});

    //Grab statistics from database
    $.ajax({
        type: "POST",
        dataType: "json",
        async: false,
        url: "fetchEntrepreneurStatistics.php",
        success: function (data) {
            displayStatistics(data);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert("Error: " + jqXHR.responseText);
        }
    });
});