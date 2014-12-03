/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function displayNewProfiles(data) {
    var profile;
    for (i = 1; i < Object.keys(data).length + 1; i++) {
        $("#" + i).css("visibility", "visible");
        profile = data["" + i];
        $("#" + i).html(
                '<div class="col-sm-12">' +
                            '<div class="col-xs-12 col-sm-8">' +
                                '<h2><font color="red">' + profile["firstname"] + " " + profile["lastname"] + '</font></h2>' +
                                '<p><strong><font color="red">Alma mater: </font></strong><font color="red">' + profile['almamater'] + '</font></p>' +
                                '<p><strong><font color="red">City: </font></strong><font color="red">' + profile['city'] + '</font></p>' +
                            '</div>' +              
                            '<div class="col-xs-12 col-sm-4 text-center">' +
                                '<figure><img src="PROFILE_PICTURES/' + profile['profilepicture'] + '" alt="Profile Picture missing" class="profilepicture"></figure>' +
                            '</div>' +
                        '</div>' +
                        '<div class="">' + 
                        //'<iframe src="http://vimeo.com/91110672" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></div>'
                        
                        '<video class="businessVideos" controls>' +
                            '<source src="BUSINESS_VIDEOS/testvideo.mp4" type="video/mp4">' + 
                        '</video></div>'+
                        '<div  class ="" >'+
                    '<button type="button" id ="nothanks" style = "float:left" class="depth1">X</button>'+
                    '<button type="button" id ="feedback" class="centered text-center depth2">?</button>'+
                    '<button type="button" id ="match" class="depth">&#10004;</button>'+
                    
                '</div>');
        $("#" + i).attr("name",profile['business_id']);
        $("#f"+i).html("<h1> " + profile["business_name"] + "</h1><br />" +
                "Business type: " + profile["business_type"] + "<br />" +
                "Creator: " + profile["firstname"] + " " + profile["lastname"] + "<br />" +
                "Alma mater: " + profile['almamater'] + "<br />" +
                "Location: " + profile['city'] + "<br />" +
                "Description :" + profile['business_description'] + "<br />" +
                "<button type='button' class='return'>Return to Browse</button>");
        
    }
}

$(document).ready(function() {
    //initialize sidebar
    $("ul#demo_menu1").sidebar({});

    //initialize coverflow
    $('.coverflow').coverflow({
        index: 3,
        density: 2,
        innerOffset: 50,
        innerScale: .7
        /*animateStep: function(event, cover, offset, isVisible, isMiddle, sin, cos) {
            if (isVisible && isMiddle) {
                alert($(cover).index());
            }
        },*/
        /*change: function(cover, index){
            alert($(cover).html());
        }*/
        
                
    });
   
   function ShowDialog(modal)
   {
     
      $("#dialog").fadeIn(300);

     
   }

   function HideDialog()
   {
      
      $("#dialog").fadeOut(300);
   } 
    

    //Grab 5 profiles to start
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "fetchProfile.php",
        //Set cover content to the 5 fetched profiles
        success: function(data) {
            displayNewProfiles(data);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert("Error: " + jqXHR.responseText);
        }
    });

    //Next fetches 5 random profiles to display 
    $("#next").click(function() {
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "fetchProfile.php",
            //Set cover content to the 5 fetched profiles
            success: function(data) {
                displayNewProfiles(data);
            }
        });
    });
    $("#feedback").click(function(){
       ShowDialog(); 
    });
    $("#btnClose").click(function(){
        HideDialog();
    });
    $("#btnSubmit").click(function(){
        var id = $('.coverflow').coverflow("cover").attr('name');
        var radio;
        if($('#feed1').is(':checked')) { radio = "Not interested in product."; }
        if($('#feed2').is(':checked')) { radio = "Unrealistic"; }
        if($('#feed3').is(':checked')) { radio = "Needs Refinement"; }
        
        if($("#feed4").val()!== ""){
            $.post('feedback.php', { businessid: id,radio: radio,other:$("#feed4").val()}, function(data){
             alert(id);
             alert(radio);
             alert($("#feed4").val());
           
            
             
             
        }).fail(function() {
         
            
            alert( "Posting failed." );
             
        });
        }
        else{
            $.post('feedback.php', { businessid: id,radio: radio}, function(data){
             
           
            
             
        }).fail(function() {
         
            
            alert( "Posting failed." );
             
        });
        }
        
        HideDialog();
    });
$(document).on('click','.viewProfile',function() {
        var id = $('.coverflow').coverflow("cover").attr('id');
        $('#profiles').hide();
        $('#fullProfile').css("display","block");
        $('#f'+id).css("display","block");
        
        
    });
    $(document).on('click','.return',function(event){
        var id = $('.coverflow').coverflow("cover").attr('id');
        $('#f'+id).css("display","none");
        $('#fullProfile').css("display","none");
        $('#profiles').show();
    });
    $("#match").click(function() {
        var id = $('.coverflow').coverflow("cover").attr('name');
        //var arr = {"businessid":};
        $.post('browseMatching.php', { businessid: id,match: 1}, function(data){
             
           $("#"+$('.coverflow').coverflow("cover").attr('id')).html("<img src = '"+"IMG/check.png' />");
            alert("Matched!");
             
        }).fail(function() {
         
            
            alert( "Posting failed." );
             
        });
       
    });
       

    $("#nothanks").click(function (){
        var id = $('.coverflow').coverflow("cover").attr('name');
        //var arr = {"businessid":};
        $.post('browseMatching.php', { businessid: id,match: 0}, function(data){
             
           $("#"+$('.coverflow').coverflow("cover").attr('id')).html("<img src = '"+"IMG/x.jpeg' />");
            alert("Why not? Provide feedback if you have a minute.");
             
        }).fail(function() {
         
            
            alert( "Posting failed." );
             
        });
    });
    $("#track").click(function (){
        var id = $('.coverflow').coverflow("cover").attr('name');
        //var arr = {"businessid":};
        $.post('browseTracking.php', { businessid: id}, function(data){
             
           
            alert("You have begun tracking this profile!");
             
        }).fail(function() {
         
            
            alert( "Posting failed." );
             
        });
    });
    
});




