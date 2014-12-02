/*
 * OAuth Keys
Consumer Key / API Key:
77jkkuk0zuikzv
Consumer Secret / Secret Key:
RmAPN0iwSPvJXqJE
Don't share this secret with anyone.
OAuth 1.0a User Token:
38500a35-93d1-4d91-9bfa-dcf37d89e7a9
OAuth 1.0a User Secret:
7e960f43-1ad6-42a4-92ce-f04c4dacd60d
Don't share this secret with anyone.
*/
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
    
});

   