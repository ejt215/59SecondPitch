/* Name: investorFavorites
 * Authors: Maxwell Smith & Eric Thornton
 * Description: Displays entrepreneur ventures that an investor has matched with
 */
function displayIdeas(data) {
    var profile;
    for (i = 0; i < Object.keys(data).length+1; i++) {
        profile = data["" + i];
        
        $("body").append('<div class="flip-container">'+
        '<div class="flipper">'+
            '<div class="front" style"padding-top:0px;">'+
            
                '<p id="titulo">'+profile["business_name"]+'</p>'+
                '<p>'+profile["business_type"]+'</p>'+
                '<p>Creator: '+profile["firstname"]+' '+profile["lastname"]+'</p>'+
                '<p>Location: '+profile["city"]+'</p>'+
                '<p>Age:'+profile["age"]+'</p>'+
                '<p>Alma Mater:'+profile["almamater"]+'</p>'+
                
            '</div>'+
            '<div class="back" style="background:#000000;">'+
                '<div class="centered text-center">' + 
                        '<iframe width="200" height="250" src="' + profile['business_video'] + '" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></div>'+       
                '</div>'+
            '</div>'+
        '</div>');
        
    }
}
$(document).ready(function() {
    
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "fetchInvestorFavorites.php",
        //Grab the matched profiles from the database
        success: function(data) {
            displayIdeas(data);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert("Error: " + jqXHR.responseText);
        }
    });
});