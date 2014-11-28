

function displayIdeas(data) {
    var profile;
    for (i = 0; i < Object.keys(data).length+1; i++) {
        profile = data["" + i];
        
            $("body").append("<div class='panel panel-default businessCard'>" +
                    "<div class='panel-heading'>" +
                    "<h3 class='panel-title'>" + profile["business_name"] + "</h3>" +
                    "</div>" +
                    "<div class='panel-body'>" + "Type: "+profile["business_type"]  + "<br />" +
                    "Description: " + profile["business_description"] +
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


