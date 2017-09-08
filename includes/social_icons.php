
<?php
class SocialIcons {
	
	function CustomizerSocialIcons() {

		$output = '';
		$output .= '<h1>EPP Social Icons Customizer</h1>';
		$output .= '<h3>SOCIAL ICON OPTIONS</h3>';
		// $output .= '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>';
		$output .= '<form action="' . $_SERVER['PHP_SELF'] . '" method="post" id="form-social-icon">';
		$output .= '<input type="hidden" name="action" value="submitted" />';
		//$output .= '<input type="checkbox" id="label_option" name="label_option" value="label_optioin">Display Social Labels';
		//$output .= '<hr/>';
		$output .= '<input type="checkbox" id="fb" name="fb" value="fb">Facebook';
		
		$output .= '<div id="fb-id-label">';
		$output .= '<br/>';
		$output .= '			<label for="fb-id">Enter ID</label>';
		$output .= '			<input type="text" id="fb-id" name="fb-id" placeholder="Enter ID"/>';
		$output .= '<br/>';
		$output .= '			<label for="fb-label">Enter Label</label>';
		$output .= '			<input type="text" id="fb-label" name="fb-label" placeholder="Like us on Facebook"/>';
		$output .= '</div>';

		$output .= '<br/>';
  		$output .= '<input type="checkbox" id="twitter" name="twitter" value="twitter">Twitter';
		$output .= '<div id="twitter-id-label">';
		$output .= '<br/>';
		$output .= '			<label for="twitter-id">Enter ID</label>';
		$output .= '			<input type="text" id="twitter-id" name="twitter-id" placeholder="Enter ID"/>';
		$output .= '<br/>';
		$output .= '			<label for="twitter-label">Enter Label</label>';
		$output .= '			<input type="text" id="twitter-label" name="twitter-label" placeholder="Check out Twitter"/>';
		$output .= '</div>';

		$output .= '<br/>';

		$output .= '<h3>ICONS POSITION STYLE OPTIONS</h3>';
  		$output .= '<input type="radio" name="position_option" id="hs" value="hs" checked="checked">Horizontal Small<br>';
  		$output .= '<input type="radio" name="position_option" id="hl" value="hl">Horizontal Large<br>';
  		$output .= '<input type="radio" name="position_option" id="vs" value="vs">Vertical Small<br>';
  		$output .= '<input type="radio" name="position_option" id="vl" value="vl">Vertical Large<br>';
  		$output .= '<br/>';
  		$output .= '<br/>';
  		$output .= '<button type="button" id="generate-shortcode">Generate Shortcode</button>';
  		$output .= '</form>';
  		$output .= '<h4>COPY AND PASTE TO YOUR POST THE SHORTCODE</h4>';
  		$output .= '<div id="shortcode-for-socials"></div>';
  		$output .= '<br/><br/>';
  		$output .= '<h4>VIEW PREVIEW HERE</h4>';
  		$output .= '<div id="preview-for-socials"></div>';



  

		return $output;
	}
	

}
?>