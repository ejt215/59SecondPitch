/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function() {
    //initialize sidebar
    $("ul#demo_menu1").sidebar({});

    //initialize coverflow
    $('.coverflow').coverflow({
        index: 6,
        density: 2,
        innerOffset: 50,
        innerScale: .7
    });

    //Next fetches 5 random profiles to display 
    $("#next").click(function() {


        var clickBtnValue = $(this).val();

        data = {'action': clickBtnValue};

        //data = $(this).serialize() + "&" + $.param(data);
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "fetchProfile.php",
            data: data,
            //Set cover content to the 5 fetched profiles
            success: function(data) {

                var profile;
                for (i = 1; i < 6; i++) {
                    profile = data["" + i];

                    $("#" + i).html(
                            "<h1> " + profile["business_name"] + "</h1><br />Business type: " + profile["business_type"] + "<br />Creator: " + profile["firstname"] + " " + profile["lastname"] + "<br /> " +
                            "Almamater: " + profile['almamater'] + "<br />Location: " + profile['city'] + "<br />" + "Description :<br /><br /><br />" + profile['business_description']
                            );

                }
            }
        });
    });
});



