<?php
/*
Plugin Name: Idno Wordpress Embed
Plugin URI: https://github.com/mapkyca/idno-wordpress-embed
Description: Adds an embed code for embedding idno posts into your wordpress blog.
Version: 1.0
Author: Marcus Povey
Author URI: http://www.marcus-povey.co.uk
License: GPLv2 or later
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

define('IDNOWORDPRESS_VERSION', '1.1');

/**
 * Init the  plugin
 */
function idnowp_init()
{
	// Add shortcodes
	add_shortcode('idno', 'idnowp_shortcode');
	add_shortcode('known', 'idnowp_shortcode');
}

/**
 * Shortcode handler
 */
function idnowp_shortcode($attr, $content)
{
    // Get attributes
    $attr = shortcode_atts(array(
	    'width' => 500,
	    'height' => 300,
    ), $attr);

    
    ob_start();
?>
<iframe src="<?php echo $content ?>?_t=embed&width=<?php echo $attr['width']; ?>&height=<?php echo $attr['height']; ?>" seamless style="border: 0px; overflow: hidden; width: <?php echo $attr['width']; ?>px; height: <?php echo $attr['height']; ?>px;"></iframe>
<?php
    return ob_get_clean();
}

// Listen for init and header requests
add_action('init', 'idnowp_init');
