<?php
/*
Plugin Name: Enactus Valpo WordPress Boilerplate
Description: This plugin serves as a template for the development of other WordPress plugins.
Version: 1.0.0
Author: Cristian Abello
Author URI: mailto:cristian.abello@valpo.edu
License: GNU AGPL
*/

class sampleAddon{

    function __construct() {
        
        // Run our activation and deactivation hooks
		register_activation_hook( __FILE__, array( $this, 'activate' ) );
		register_deactivation_hook( __FILE__, array( $this, 'deactivate' ) );
    
        // If BadgeOS is unavailable, deactivate our plugin
		add_action( 'admin_notices', array( $this, 'maybe_disable_plugin' ) );
		
		// Include our other plugin files
		add_action( 'init', array( $this, 'includes' ) );
    
    }
    
    public function includes() {
        // Include files
        

        // Add files individually later on in like so:
        require_once( $this->directory_path . '/includes/sample.php' );
        
    }
    
    public function activate() {
        // Fun activation stuff
    }
    
    public function deactivate() {
        // Fun deactivation stuff
    }
    
    public static function meets_requirements() {
        /*
        // class_exists checks that another plugin is active
        if(class_exists(?????))
            return true;
        else
            return false;
        */
        
        // Delete this once you've filled in and uncommented the if-else statement above.
        return false;
    }
    
    public function maybe_disable_plugin() {
        		
        	if ( ! $this->meets_requirements() ) {
    		
    		// Display our error
    		echo '<div id="message" class="error">';
    		echo '<p>' . sprintf( __( 'This plugin requires ???? and has been <a href="%s">deactivated</a>. Please install and activate ???? and then reactivate this plugin.', 'sample-addon' ), admin_url( 'plugins.php' ) ) . '</p>';
    		echo '</div>';
    
    		// Deactivate our plugin
    		deactivate_plugins( $this->basename );
    			
    		// Stop WordPress from displaying "Plugin Activated" message.
    		if ( isset( $_GET['activate'] ) ) 
                unset( $_GET['activate'] );
                
        }
    
    }

}

$GLOBALS['sample_addon'] = new sampleAddon();

?>