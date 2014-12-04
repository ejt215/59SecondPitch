/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function displayIdeas(data) {
    var profile;
    for (i = 1; i < Object.keys(data).length + 1; i++) {
        $("#profile").append('<div class ="cover " name ="" id ="' + i + '" style ="border: 2px solid;"></div>');
                    
                   /* <div class ="cover " name ="" id ="2" style ="border: 2px solid;"></div>
                    <div class ="cover " name ="" id ="3" style ="border: 2px solid;"></div>
                    <div class ="cover " name ="" id ="4" style ="border: 2px solid;"></div>
                    <div class ="cover " name ="" id ="5" style ="border: 2px solid;"></div>*/
        //$("#" + i).css("visibility", "visible");
        profile = data["" + i];
        $("#" + i).html(
               /* "<form action='entrepreneurEditProfile.php' method='POST'> " +
                "<h1>" + profile["business_name"] + "</h1><br />" +
                "<b>Business type</b>: " + profile["business_type"] + "<br />" +
                "<b>Description</b> :" + profile['business_description'] + "<br />" +
                "<button type='submit' class='editProfile' id='b" + i + "'>Edit</button>" +
                "<input type='hidden' name='business_name' value='" + profile["business_name"] + "'>" +
                "<input type='hidden' name='business_type' value='" + profile["business_type"] + "'>" +
                "<input type='hidden' id='bi" + profile["business_id"] + "' name='business_id' value='" + profile["business_id"] + "'>" +
                "<input type='hidden' name='business_description' value='" + profile["business_description"] + "'>" +
                "</form>"*/
                "<form action='entrepreneurEditProfile.php' method='POST'> " +
                 '<div class="col-sm-12">' +
                            '<div class="col-xs-12 col-sm-8">' +
                                '<h2><font color="white">' + profile["business_name"] +  '</font></h2>' +
                                '<h2><font color="white"> Type: ' + profile['business_type'] + '</font><h2>' +
                                
                            '</div>' +              
                            
                        '</div>' +
                        '<div class="">' + 
                        '<iframe width="500" height="275" src="' + profile['business_video'] + '" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></div>' +
                        "<button type='submit' class='editProfile ph-button ph-btn-red' id='b" + i + "'>Edit</button>" +
                        "</form>"
                
                );
        $("#" + i).attr("name", profile['business_id']);

    }
}

$(document).ready(function() {

//initialize sidebar
    $("ul#sidebar").sidebar({});

    //Grab 5 profiles to start
    $.ajax({
        type: "POST",
        dataType: "json",
        async: false,
        url: "fetchEntrepreneurProfiles.php",
        //Set cover content to the 5 fetched profiles
        success: function(data) {
            displayIdeas(data);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert("Error: " + jqXHR.responseText);
        }
    });



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

    $("#newIdea").click(function() {
        window.location = "entrepreneurSignup.php";
    });
    $("#deleteIdea").click(function() {
        var id = $('.coverflow').coverflow("cover").attr('id');
        var businessID = $('.coverflow').coverflow("cover").find("[id^=bi]").attr("id");
        alert(id + "    " + businessID);

        //Remove should be changed so that the cover can be added again
        $("#" + id).remove();
        $.ajax({
            type: "POST",
            processData: true,
            async: false,
            data: {
                delete: "delete",
                business_id: businessID
            },
            url: "addUpdateDeleteEntrepreneurProfile.php",
            success: function(data) {
                alert("You have succesfully deleted your idea!");
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert("Error: " + jqXHR.responseText);
                alert("Error: " + jqXHR.textStatus);
                alert("Error: " + jqXHR.errorThrown);
            }
        });
    });
});