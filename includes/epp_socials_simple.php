<?php 
require_once(__ROOT__.'/includes/social_icons.php');
require_once(__ROOT__.'/social_feeds/social_feeds.php');

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

        add_submenu_page( 'epp-socials-dashboard', 'Epp Socials' . ' Settings', 'SOCIAL FEEDS', 'manage_options', 'epp-socials-feed', array(
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


      $social_feeds = new SocialFeeds();
      $out = $social_feeds->CustomizerSocialFeeds();
      echo $out;

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
