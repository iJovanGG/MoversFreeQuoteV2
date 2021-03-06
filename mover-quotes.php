<?php

/**
* Plugin Name: Mover Quotes
* Plugin URI: https://github.com/iJovanGG/MoversFreeQuoteV2
* GitHub Plugin URI: https://github.com/iJovanGG/MoversFreeQuoteV2
* Description: Create forms for moving services easy
* Version: 1.1.3
* Author: Jovan Mladenovic
* License:           GNU General Public License v2
* License URI:       http://www.gnu.org/licenses/gpl-2.0.html
**/
function movers_admin_menu_option(){
    add_menu_page('movers free quote', 'Movers Forms', 'manage_options', 'movers-forms', 'movers_free_quote_page', '', 200);
}

add_action('admin_menu', 'movers_admin_menu_option');


function movers_free_quote_page(){
    
    global $wpdb;
    $table_name = $wpdb->prefix . 'movers_form_v2';

    if(array_key_exists('submit', $_POST)){
        $post_data = array(
            'two_step_form' => (isset($_POST['two_step_form'])? '1' : '0'),
            'two_step_form_only_mobile' => (isset($_POST['two_step_form_only_mobile'])? '1' : '0'),
            'redirect_url' => $_POST['redirect_url'],
            'company_id' => $_POST['company_id'],
            'form_header_text' => $_POST['form_header_text'],
            'primary_color' => $_POST['primary_color'],
            'secondary_color' => $_POST['secondary_color'],
            'form_preset' => $_POST['form_preset'],
            'send_bitton_text' => $_POST['send_bitton_text'],
            'form_border_radius' => $_POST['form_border_radius'],
            'button_border_radius' => $_POST['button_border_radius'],
        );
        update_option('movers_quote_options', $post_data);
        //$wpdb->update($table_name,$post_data, array( "id" => 1 ));
    }

    //$form_options = (array) $wpdb->get_results( "SELECT * FROM $table_name WHERE id = 1" )[0];
    $form_options = get_option('movers_quote_options');
    if($form_options == false){
        $form_options = array(
            'two_step_form' => (isset($_POST['two_step_form'])? '1' : '0'),
            'two_step_form_only_mobile' => (isset($_POST['two_step_form_only_mobile'])? '1' : '0'),
            'redirect_url' => '',
            'company_id' => '',
            'form_header_text' => '',
            'primary_color' => '',
            'secondary_color' => '',
            'form_preset' => '',
            'send_bitton_text' => '',
            'form_border_radius' => '',
            'button_border_radius' => '',
        );
    }

    include 'movers-admin-panel.php';
}

function movers_form_install(){

}

register_activation_hook( __FILE__, 'movers_form_install' );

function generate_free_quote_form() {
    $form_options = get_option('movers_quote_options');
    if($form_options == false)
        return 'free quote form options not set.';

    ob_start(); // start a buffer
    switch($form_options['form_preset']){
        case 0:
            include 'presets/preset_0.php';
            break;
        case 1:
            include 'presets/preset_1.php';
            break;
        case 2:
            include 'presets/preset_2.php';
            break;
        case 3:
            include 'presets/preset_3.php';
            break;
        case 4:
            include 'presets/preset_4.php';
            break;
        default:
            include 'presets/preset_1.php';
            break;
    }

    $content = ob_get_clean(); // get the buffer contents and clean it
    return $content;
}

add_shortcode('free-quote', 'generate_free_quote_form');


function load_plugin_css() {
    $plugin_url = plugin_dir_url( __FILE__ );
    wp_enqueue_style( 'bootstrap', $plugin_url . 'assets/css/bootstrap/bootstrap.min.css' );
    wp_enqueue_style( 'free-quote', $plugin_url . 'assets/css/movers-quote.css' );
    wp_enqueue_style( 'bootstrap-datepicker', $plugin_url . 'assets/css/bootstrap/datepicker/bootstrap-datepicker.min.css' );
    wp_enqueue_style( 'bootstrap-selectpicker', 'https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css' );
     
}
add_action( 'wp_enqueue_scripts', 'load_plugin_css' );



/** Load JS **/
function load_scripts()
{
    wp_enqueue_script('jquery', plugins_url('assets/js/jquery-3.5.1.min.js', __FILE__));
    wp_enqueue_script('free-quote-inputmask-js', plugins_url('assets/js/jquery.inputmask.bundle.js', __FILE__), array('jquery'));
    wp_enqueue_script('jquery-validator', plugins_url('assets/js/jquery.validate.min.js', __FILE__), array('jquery'));
    wp_enqueue_script('bootstrap-js', plugins_url('assets/js/bootstrap/bootstrap.min.js', __FILE__), array('jquery'));
    wp_enqueue_script('bootstrap-datepicker-js', plugins_url('assets/js/bootstrap/datepicker/bootstrap-datepicker.min.js', __FILE__), array('jquery'));
    wp_enqueue_script('bootstrap-selectpicker-js', 'https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js', array('jquery'));
    wp_enqueue_script('free-quote-js', plugins_url('assets/js/movers-quote.js', __FILE__), array('jquery'));
}
add_action('wp_enqueue_scripts', 'load_scripts');
?>