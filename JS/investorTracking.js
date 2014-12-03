

function displayIdeas(data) {
    var profile;
    for (i = 0; i < Object.keys(data).length+1; i++) {
        profile = data["" + i];
        
            $("body").append("<div class='panel panel-default businessCard'>" +
                    "<div class='panel-heading'>" +
                    "<h3 class='panel-title'>" + profile["business_name"] + "</h3>" +
                    "</div>" +
                    "<div class='panel-body'>" + 
                    
                    
                        
                        '<div class="centered text-center">' + 
                        '<iframe width="150" height="150" src="' + profile['business_video'] + '" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></div>'+
                    "</div>" +
                    "</div>");
        
    }
}
$(document).ready(function() {
    
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "fetchInvestorTracks.php",
        //Set cover content to the 5 fetched profiles
        success: function(data) {
            
            displayIdeas(data);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert("Error: " + jqXHR.responseText);
        }
    });
});


