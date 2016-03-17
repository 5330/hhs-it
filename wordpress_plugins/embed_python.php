<?php
/**
 * Plugin Name: Joe's python thing.
 * Plugin URI: http://URI_Of_Page_Describing_Plugin_and_Updates
 * Description: A brief description of the Plugin.
 * Version: The Plugin's Version Number, e.g.: 1.0
 * Author: Name Of The Plugin Author
 * Author URI: http://URI_Of_The_Plugin_Author
 *  slightly modified by John Read
 * License: A "Slug" license name e.g. GPL2
 */
/*from http://wordpress.stackexchange.com/questions/120259/running-a-python-scri
pt-within-wordpress/120261?noredirect=1#120261  */
add_shortcode( 'python', 'embed_python' );

function embed_python( $attributes )
{
    $data = shortcode_atts(
        array(
            'file' => 'hello.py'
        ),
        $attributes
    );
    $handle = popen( __DIR__ . '/' . $data['file'], 'r');
    $read   = fread($handle, 2096);
    pclose($handle);

    return nl2br($read);
}

