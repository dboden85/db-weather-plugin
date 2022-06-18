<?php
/**
 * Plugin Name:       DB Weather Plugin
 * Plugin URI:        https://github.com/dboden85/db-weather-plugin
 * Description:       Add a simple contact form to your website
 * Version:           0.1
 * Author:            David Boden
 * Author URI:        https://www.db-websites.com
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://github.com/dboden85/db-weather-plugin
 * GitHub Plugin URI: https://github.com/dboden85/db-weather-plugin
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
add_action('admin_menu', 'db_weather_plugin_options_page');

function add_weather_plugin_admin_styles(){
    wp_enqueue_style('weather-plugin-admin-styles', plugins_url( '/weather-admin-menu-style.css', __FILE__ ));
}
add_action('admin_enqueue_scripts', 'add_weather_plugin_admin_styles');

function weather_plugin_settings_html()
{

    if(array_key_exists('submit-settings', $_POST))
    {
        //updating button options
        // update_option();
    }

    //variables to hold widget settings
?>
    <div class="wrap">
        <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
        <form method="post" action="">

            <div id="weather_settings_container">
                <div id="tab_information_container">
                    
                    <div class="settings_tab_info">
                    <h2>Weather Plugin Settings</h2>

                        <div class="row">
                            <div>

                            <label for="api-key">API Key</label>
                            <input type="text" name="api-key" />

                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <input type="submit" name="submit-settings" value="Submit Settings" class="button button-primary" id="db-settings-submit-button"/>
        </form> 
    </div>
<?php
}
