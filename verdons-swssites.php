<?php
/*
Plugin Name: Verdon's Get Special Sites
Description: A shortcode to get the list of sites from sws.nipissingu.ca [swssites]
Version: 1.0.0
Author: Verdon Vaillancourt
Author URI: http://verdon.ca/
Update URL: https://github.com/verdonv/vv-swssites/
License: GPLv2 or later
Text Domain: vv-swssites
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


function vve_swssites($atts, $content=null){
	/* get the page */
	$page = file_get_contents('https://sws.nipissingu.ca/');

	/* scrape what we want */
	preg_match("/<div id=\"mssls\".*div>/", $page, $list);

	/* change the id of the div to avoid a clash */
	$list = preg_replace("/id=\"mssls\"/","id=\"mssls2\"",$list);

    return $list[0];
}
add_shortcode('swssites', 'vve_swssites');


?>