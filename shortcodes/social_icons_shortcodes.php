<?php 
/*
   This is a procedural php file which contains a function
   that performs the logic of the shortcodes

   Improvements 
   1. Use array to perform on each social media icons
*/
function epp_social_icons_shortcode($atts) {
   extract(shortcode_atts(array(
      'style' => "TRENDING",
      'type_1' => null,
      'label_1' => "Like us on Facbook",
      'id_1' => "",
      'type_2' => null,
      'label_2' => "Check out Twitter",
      'id_2' => "",
   ), $atts));


$outs = '';
if($style == "horizontal small") {
   $outs .= '<div class="hs">';
}elseif($style == "horizontal large"){
   $outs .= '<div class="hl">';
}elseif($style == "vertical small"){
   $outs .= '<div class="vs">';
}elseif($style == "vertical large"){
   $outs .= '<div class="vl">';
}else{
   $outs .= '<div class="trendint">';
}
$outs .= '<h5>'. $style . '</h5>';
//if(!is_null($type_1)) {
$outs .= '<div class="img_block">';
$outs .= '<a href="https://www.facebook.com/'. $id_1 . '" target="_blank">';
$outs .= '<span class="helper"><img src="'. plugins_url() . '/epp_socials/assets/icons/fb.jpg" width="50" height="50" /></span>';
$outs .= '</a>';
$outs .= '<p>'. $label_1 .'</p>';
$outs .= '</div>';
//}
//if(!is_null($type_2)) {
$outs .= '<div class="img_block">';
$outs .= '<a href="https://twitter.com/'. $id_2 .'" target="_blank">';
$outs .= '<span class="helper"><img src="'. plugins_url() . '/epp_socials/assets/icons/twitter.jpg" width="50" height="50" /></span>';
$outs .= '</a>';
$outs .= '<p>'. $label_2 .'</p>';
$outs .= '</div>';
//}
$outs .= '</div>'; // - style div
return $outs;

}


?>