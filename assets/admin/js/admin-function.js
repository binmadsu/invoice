$(document).ready(function()
	{
		$("#email_template_drop").change(function(){
        var itemid=$(this).val();
	
		  if(itemid==''){ return false; }
	  $(".loading_box_img").show();
	   var url = base_url+'admin/email_template/'+itemid;
	  $("#dynamic_email_content").load(encodeURI(url), function()
	  {$(".loading_box_img").hide();})
	})
	//item details accordion
		
		//$('div.panel-collapse:not(:first)').hide();
	});
