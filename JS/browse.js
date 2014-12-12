/* Name: browse
 * Authors: Maxwell Smith & Eric Thornton
 * Description:  This page allows investors to see entrepreneur ideas
 */

//Displays up to 5 profiles
function displayNewProfiles(data) {
    var profile;
    //alert(JSON.stringify(data));
    for (i = 1; i < Object.keys(data).length + 1; i++) {
        if (!$('#'+i).length){
                $("#profile").append('<div class ="cover " name ="" id ="' + i + '" style ="border: 2px solid;"></div>');

    }
        profile = data["" + i];
        //put profiles in coverflow (each coverflow has an id from 1-6)
        $("#" + i).html(
                '<div class="col-sm-12">' +
                            '<div class="col-xs-12 col-sm-8">' +
                                '<h2><font color="white">' + profile["firstname"] + " " + profile["lastname"] + '</font></h2>' +
                                '<p><strong><font color="red">Alma mater: </font></strong><font color="white">' + profile['almamater'] + '</font></p>' +
                                '<p><strong><font color="red">City: </font></strong><font color="white">' + profile['city'] + '</font></p>' +
                            '</div>' +              
                            '<div class="col-xs-12 col-sm-4 text-center">' +
                                '<figure><img src="PROFILE_PICTURES/' + profile['profilepicture'] + '" alt="Profile Picture missing" class="profilepicture"></figure>' +
                            '</div>' +
                        '</div>' +
                        '<div class="">' + 
                        '<iframe width="500" height="275" src="' + profile['business_video'] + '" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></div>' +
                        '<div  class ="" >'+
                            '<button type="button" id ="nothanks" style = "float:left" class="nothanks depth1">X</button>'+
                            '<button type="button" id ="maybe" class="maybe centered text-center depth2">?</button>'+
                            '<button type="button" id ="match" class="match depth">&#10004;</button>'+             
                        '</div>');
        $("#" + i).attr("name",profile['business_id']);
    }
}

$(document).ready(function() {
    //initialize sidebar
    $("ul#demo_menu1").sidebar({});

    //Grab 5 profiles to start
    $.ajax({
        type: "POST",
        dataType: "json",
        async: false,
        url: "fetchProfile.php",
        //Set cover content to the 5 fetched profiles
        success: function(data) {
            displayNewProfiles(data);
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
   
   function ShowDialog(modal)
   {
      $("#dialog").fadeIn(300);
   }

   function HideDialog()
   { 
      $("#dialog").fadeOut(300);
   } 

    //Next fetches 5 random profiles to display 
    $("#next").on('click',function() {
        $.ajax({
            type: "POST",
            dataType: "json",
            async: false,
            url: "fetchProfile.php",
            
            //Set cover content to the 5 fetched profiles
            success: function(data) {
                displayNewProfiles(data);
            }
        });
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
            $.post('feedback.php', 
            { 
                businessid: id,
                radio: radio,
                other:$("#feed4").val()
            }, 
            function(data){}).fail(function() {
            alert( "Posting failed." );
            });
        }
        else{
            $.post('feedback.php', 
            {   businessid: id,
                radio: radio
            }, function(data){
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
    $(document).on('click','.match',function() {
        var id = $('.coverflow').coverflow("cover").attr('name');
        //var arr = {"businessid":};
        $.post('browseMatching.php', { businessid: id,match: 1}, function(data){
             
           $("#"+$('.coverflow').coverflow("cover").attr('id')).html("<img src = '"+"IMG/check.png' />");
            
             
        }).fail(function() {
         
            
            alert( "Posting failed." );
             
        });
       
    });
       

    $(document).on('click','.nothanks',function (){
        var id = $('.coverflow').coverflow("cover").attr('name');
        //var arr = {"businessid":};
        
        $.post('browseMatching.php', { businessid: id,match: 0}, function(data){
             
           $("#"+$('.coverflow').coverflow("cover").attr('id')).html("<img src = '"+"IMG/x.jpeg' />");
            ShowDialog();
             
        }).fail(function() {
         
            
            alert( "Posting failed." );
             
        });
    });
    $(document).on('click','.maybe',function (){
        var id = $('.coverflow').coverflow("cover").attr('name');
        //var arr = {"businessid":};
        $.post('browseTracking.php', { businessid: id}, function(data){
             
           
            alert("You have begun tracking this profile!");
             
        }).fail(function() {
         
            
            alert( "Posting failed." );
             
        });
    });
    
});




