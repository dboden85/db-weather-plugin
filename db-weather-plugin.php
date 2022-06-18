<?php
/**
 * Plugin Name:       DB Simple Contact Form
 * Plugin URI:        https://github.com/dboden85/db-contact-form
 * Description:       Add a simple contact form to your website
 * Version:           0.1
 * Author:            David Boden
 * Author URI:        https://www.db-websites.com
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://github.com/dboden85/db-contact-form
 * GitHub Plugin URI: https://github.com/dboden85/db-contact-form
 */

ini_set('display_errors', 1); 
error_reporting(E_ALL);

function db_weather_plugin_options_page()
{

    add_menu_page(
        'Weather Plugin Settings',
        'DB Weather',
        'manage_options',
        'weather-plugin-settings',
        'weather_plugin_settings_html'
    );
}
add_action('admin_menu', 'db_contact_form_options_page');

function add_contact_form_admin_styles(){
    wp_enqueue_style('weather-plugin-admin-styles', plugins_url( '/weather-admin-menu-style.css', __FILE__ ));
}
add_action('admin_enqueue_scripts', 'add_contact_form_admin_styles');

function weather_plugin_settings_html()
{

    if(array_key_exists('submit-settings', $_POST))
    {
        //updating button options
        update_option('to-email', $_POST['to-email']);
        update_option('subject', $_POST['subject']);
        update_option('user-message', $_POST['user-message']);

    }

    //variables to hold widget settings
    $to_email = get_option('to-email', '');
    $subject = get_option('subject', '');
    $user_message = get_option('user-message', '');
?>
    <div id="db-admin" class="wrap">
        <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
        <form method="post" action="">
            
            <input type="submit" name="submit-settings" value="Submit Settings" class="button button-primary" id="db-settings-submit-button"/>
        </form> 
    </div>
<?php
}
