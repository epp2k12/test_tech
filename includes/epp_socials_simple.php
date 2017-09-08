<?php 
require_once(__ROOT__.'/includes/social_icons.php');

class Epp_Socials_Simple{

  // Constructor
    function __construct() {

        add_action( 'admin_menu', array( $this, 'wpa_add_menu' ));
        register_activation_hook( __FILE__, array( $this, 'wpa_install' ) );
        register_deactivation_hook( __FILE__, array( $this, 'wpa_uninstall' ) );
    }
    /*
      * Actions perform at loading of admin menu
    */
    function wpa_add_menu() {
        add_menu_page( 'Epp Socials', 'Epp Socials', 'manage_options', 'epp-socials-dashboard', array(
                          __CLASS__,
                         'wpa_page_file_path'
                        ));

        add_submenu_page( 'epp-socials-dashboard', 'Epp Socials' . ' Dashboard', '<b style="color:#f9845b">SOCIAL ICONS</b>', 'manage_options', 'epp-socials-dashboard', array(
                              __CLASS__,
                             'wpa_page_file_path'
                            ));

        add_submenu_page( 'epp-socials-dashboard', 'Epp Socials' . ' Settings', 'SOCIAL FEEDS', 'manage_options', 'analytify-settings', array(
                              __CLASS__,
                             'epp_settings'
                            ));
    }
    /*
     * Actions perform on loading of menu pages
     */
    function wpa_page_file_path() {

    $social_icon = new SocialIcons();
    $out = $social_icon->CustomizerSocialIcons();
    echo $out;

    }

    function epp_settings() {

        echo '<h1>EPP SOCIAL FEEDS CUSTOMIZER</h1>';
        echo '<p id="demo">'.plugin_dir_url( __FILE__ ).'/social_feeds/tweets_json.php' .'</p>';
        echo '<script>';
        echo 'var xmlhttp = new XMLHttpRequest();';
        echo 'xmlhttp.onreadystatechange = function() {';
        echo 'if (this.readyState == 4 && this.status == 200) {';
        echo 'myObj = JSON.parse(this.responseText);';
        echo 'document.getElementById("demo").innerHTML = myObj[0].text;';
        echo ' }';
        echo '};';
        echo 'var newURL = window.location.protocol + "//" + window.location.host + "/plugins/epp_socials/social_feeds/tweets_json.php";';
        echo 'xmlhttp.open("GET", "http://localhost/tweetsJSON/tweets_json.php", true);';
        echo 'xmlhttp.send();';
        echo '</script>';

    }


    /*
     * Actions perform on activation of plugin
     */
    function epp_social_install() {



    }

    /*
     * Actions perform on de-activation of plugin
     */
    function epp_social_uninstall() {



    }

}



?>
