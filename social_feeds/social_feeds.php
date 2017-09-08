<?php
/*
  This is a php class that will generate the customizer form for social media icons.

  Improvements : 

*/
class SocialFeeds {
	
	function CustomizerSocialFeeds() {

		$output = '';
		$output .= '<h1>EPP Social Feeds Customizer</h1>';
		$output .= '<h3>SOCIAL FEEDS OPTION</h3>';
		$output .= '<form action="' . $_SERVER['PHP_SELF'] . '" method="post" id="form-social-feed">';
		$output .= '<input type="hidden" name="action" value="submitted" />';
		$output .= '<input type="checkbox" id="twitter-feed" name="twitter-feed" value="twitter-feed">Twitter';

		$output .= '<div id="fb-id-feed-label">';
		$output .= '<br/>';
		$output .= '<label for="twitter-consumer-key-feed">Enter Consumber Key</label>';
		$output .= '<input type="text" id="twitter-consumer-key-feed" name="twitter-consumer-key-feed" placeholder="Consumer Key"/>';
		$output .= '<br/>';
		$output .= '<label for="twitter-consumer-secret-feed">Enter Consumber Secret</label>';
		$output .= '<input type="text" id="twitter-consumer-secret-feed" name="twitter-consumer-secret-feed" placeholder="Consumer Secret"/>';
		$output .= '<br/>';
		$output .= '<label for="twitter-user-token-feed">Enter User Token</label>';
		$output .= '<input type="text" id="twitter-user-token-feed" name="twitter-user-token-feed" placeholder="User Token"/>';
		$output .= '<br/>';
		$output .= '<label for="twitter-user-secret-feed">Enter User Secret</label>';
		$output .= '<input type="text" id="twitter-user-secret-feed" name="twitter-user-secret-feed" placeholder="User Secret"/>';
  		$output .= '<br/>';
  		$output .= '<br/>';

  		$output .= '<button type="button" id="generate-shortcode">Generate Twitter Feeds</button>';
  		$output .= '</form>';

        $output .= '<h4>VIEW TWITTER FEEDS HERE</h4>';
        // $output .= '<p id="demox">'.plugin_dir_url( __FILE__ ).'tweets_json.php' .'</p>';
        $output .= '<div id="demo">Feeds Here</div>';
        $output .= '<script>';
        $output .= 'var xmlhttp = new XMLHttpRequest();';
        $output .= 'xmlhttp.onreadystatechange = function() {';
        $output .= 'if (this.readyState == 4 && this.status == 200) {';
        $output .= 'myObj = JSON.parse(this.responseText);';
        $output .= 'dfeeds ="";';
 		$output .= 'dfeeds +="<ul>";';
 		$output .= 'for (var i = 0, len = myObj.length; i < len; ++i) {';	
		$output .= 'dfeeds += "<li>" + myObj[i].text + "</li>";';	
     	// $output .= 'alert(myObj[i].text);';
     	$output .= '}';	
     	$output .= 'dfeeds +="</ul>";';
     	$output .= 'document.getElementById("demo").innerHTML = dfeeds ;'; 	

        $output .= ' }';
        $output .= '};';
        $output .= 'var newURL = window.location.protocol + "//" + window.location.host + "/plugins/epp_socials/social_feeds/tweets_json.php";';
        $output .= 'xmlhttp.open("GET", "'. plugin_dir_url( __FILE__ ).'tweets_json.php' .'", true);';
        $output .= 'xmlhttp.send();';
        $output .= '</script>';

		return $output;
	}
	

}
?>