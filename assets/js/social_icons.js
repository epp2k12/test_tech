/*
  This is the jquery portion of the plugin. This will generate the preview and the shortcode.

  Improvements : 
  1. Use checkbox for every social media icon and if checked place it inside the array for
     processing.
    
  2. Use pure javascript instead of JQuery. If given the time i could have used pure javascript
     to avoid conflict.

*/

$(document).ready(function(){

	show_hide_social_options();
	generate_social_icon_shortcode();

    $(function(){
        $('input:radio').change(function(){
            location.reload(); 
        });
    });
    show_if_checked()

});

function show_if_checked() {
    if($('#fb').is(':checked')) {
        $('#fb-id-label').fadeIn('slow');
    } 
    if($('#twitter').is(':checked')) {
        $('#twitter-id-label').fadeIn('slow');
    }   
}

/*
  This function is for the animation of id and label input box
  If checked the id and label input for each social icon will show
  If unchecked the id and label input for each social icon will hide
*/
function show_hide_social_options() {

 $("#fb-id-label").hide();
 $("#twitter-id-label").hide();

 $('#fb').click(function(){
	if($('#fb').is(':checked')) {
        $('#fb-id-label').fadeIn('slow');
    } else {
        $("#fb-label").val("");
        $("#fb-id").val("");
        $('#fb-id-label').fadeOut('slow');
    }
 })

 $('#twitter').click(function(){
	if($('#twitter').is(':checked')) {
        $('#twitter-id-label').fadeIn('slow');
    } else {
        $("#twitter-id").val("");
        $("#twitter-label").val("");
        $('#twitter-id-label').fadeOut('slow');
    }
 })

}
/*
  This function will generate the social icon shortcode. 
*/
function generate_social_icon_shortcode() {

	$("#generate-shortcode").click(function() {

		var sdata= $('#form-social-icon').serializeArray();
		dataObj = {};
        pre_class = "hs";
        pre_fb_label = "Like us on Facebook";
        pre_twitter_label = "Check out Twitter";

		out="[ct_socials ";
		
		positionOption = $('input[name=position_option]:checked', '#form-social-icon').val();
        switch(positionOption) {
    		case "hs":
        		out+= ' style="horizontal small"';
                pre_class = "hs";
        		break;
		    case "hl":
		        out+= ' style="horizontal large"';
                pre_class = "hl";
        		break;
		    case "vs":
		        out+= ' style="vertical small"';
                pre_class = "vs";
        		break;
		    case "vl":
		        out+= ' style="vertical large"';
                pre_class = "vl";
        		break;
    		default:
  		}

        if($("#fb").is(':checked')) {
        	out+= " type_1="+ '"facebook" ';
        	fbLabel = $("#fb-label").val();

            if(fbLabel == "") {
        		out+= ' label_1="Like Us on Facebook"';
        	}else{
        		out+= ' label_1 =' + '"'+fbLabel+'"';
                pre_fb_label = fbLabel;
        	}
        	fbId = $("#fb-id").val();
        	if(fbId == "") {
        		alert("Please supply Facebook ID");
        		return;
        	}else{
        		out+= ' id_1=' + '"'+fbId+'"';
        	}        	
        }

        if($("#twitter").is(':checked')) {
        	out+= " type_2="+ '"twitter" ';
        	twitterLabel = $("#twitter-label").val();
        	if(twitterLabel == "") {
        		out+= ' label_2="Check out Twitter"';
        	}else{
        		out+= ' label_2=' + '"'+twitterLabel+'"';
                pre_twitter_label = twitterLabel; 
          	}
        	twitterId = $("#twitter-id").val();
        	if(twitterId == "") {
        		alert("Please supply valid Twitter ID");
        		return;
        	}else{
        		out+= ' id_2=' + '"'+twitterId+'"';
        	}        	
        }

        out += "]";

/*
  This section will generate a preview of the shortcode result
  below the customizer page
*/
var url = window.location.href;
var arr = url.split("/");
var image_url_location = arr[0]+ "//" + arr[2] + "/" + arr[3];

pre_out ="";
pre_out += '<div class="img_block">';
pre_out += '<a href="https://www.facebook.com/' + $("#fb-id").val() +'" target="_blank">';
pre_out += '<span class="helper"><img src="' + image_url_location +'/wp-content/plugins/epp_socials/assets/icons/fb.jpg" /></span>';
pre_out += '</a>';
pre_out += '<p>' + pre_fb_label +'</p>';
pre_out += '</div>';
pre_out += '<div class="img_block">';
pre_out += '<a href="https://twitter.com/' + $("#twitter-id").val() +'" target="_blank">';
pre_out += '<span class="helper"><img src="' + image_url_location +'/wp-content/plugins/epp_socials/assets/icons/twitter.jpg" /></span>';
pre_out += '</a>';
pre_out += '<p>' + pre_twitter_label +'</p>';
pre_out += '</div>';
$("#shortcode-for-socials").html(out);
$("#preview-for-socials").addClass(pre_class);
$("#preview-for-socials").html(pre_out);

        pathname = "";
		$.ajax({
            "type":"POST",
            "url":pathname,
            //"data":out,
            "data":"sdata=epp_picture",
            "success":function(data) {
            // alert("We have received your reservation. We will keep in touch with you the soonest! Thanks.")
            // $('#shortcode-for-socials').html("We have received your reservation. We will keep in touch with you the soonest! Thanks.");
            }
        });
		

	});
}