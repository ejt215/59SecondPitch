/* Name: login
 * Authors: Maxwell Smith & Eric Thornton
 * Description: This is the landing page for the app that allows logging in or account creation
 */

//Handles uploading a profile picture in a way that looks good
$(document).on('change', '.btn-file :file', function() {
    var input = $(this),
            numFiles = input.get(0).files ? input.get(0).files.length : 1,
            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [numFiles, label]);
});

$(document).ready(function() {
    $('.btn-file :file').on('fileselect', function(event, numFiles, label) {
        if (numFiles > 1) {
            alert("Please select only 1 picture");
        }
        $("#profilePictureURL").val(label);
    });
    
    
    
    
    
    
    /* $.ajax({
        type: "POST",
        dataType: "json",
        url: "fetchAlmamaterCity.php",
        //Set cover content to the 5 fetched profiles
        success: function(data) {
            
        }
    });
    
     $( "#almamater" ).autocomplete({
        
               source: availableTutorials
            });*/
           /* $( "#city" ).autocomplete({
        
                source: function (request, response) {
                $.ajax({
          url: "http://gd.geobytes.com/AutoCompleteCity",
          dataType: "jsonp",
          data: {
            q: request.term
          },
          success: function( data ) {
            response( data );
          }
        }); 
                }
                
            
            
        });
        
       
        $("#city").autocomplete("option", "delay", 100); */
            
    
});

   