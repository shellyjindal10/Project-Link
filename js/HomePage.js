
$(document).ready(function()
{
	$("#header_profile").hover(function(){
		$("#header_profile_edit").css("visibility","visible");
  
	});

	$( "#header_profile" ).mouseout(function() {
		$("#header_profile_edit").css("visibility","hidden");
	});

	$("#edit_text").hover(function(){
		$("#edit_text").css("color","#32CD32");
  
	});
	$("#edit_text").mouseout(function(){
		$("#edit_text").css("color","#000080");
  
	});	
	$(window).load(function() {
						        function resizeImage(){//to resize the image src that of the profile_picture
						          img.css('height', el.height());
						        }
						        						        
						        $(window).resize(function() {
						          resizeImage();
						        });
						        
						        var el = $("#profile_picture");
						        var img = $("#image");
						        resizeImage();
    });

});



function saveonclick(id){
	                    id=id.replace(/\s/g, '');
						var edited_text = $('textarea#text_area_id_'+id).val();
         				var column_name=id;
         				var test=id.charAt(0).toUpperCase() + id.slice(1);
         				call_backend_update_save('../php/updateQuery.php?id='+column_name+'&edit='+edited_text,'text_area_id_'+id);
         				$('.save').hide();

}

function call_backend_update_save(page,div,edited_text) {

					                                    var xmlhttp;
														if (window.XMLHttpRequest)
														  {// code for IE7+, Firefox, Chrome, Opera, Safari
														  xmlhttp=new XMLHttpRequest();
														  }
														else
														  {// code for IE6, IE5
														  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
														  }

														xmlhttp.onreadystatechange=function()
														  {
														  if (xmlhttp.readyState==4 && xmlhttp.status==200)
														    {
														    document.getElementById(div).innerHTML=xmlhttp.responseText;
														    }
														  }
														xmlhttp.open("GET",page,true);
														xmlhttp.send();

}
