<?php
/**
 * @package John_Cena
 * @version 1.6
 */
/*
Plugin Name: John Cena
Plugin URI: http://wordpress.org/plugins/hello-dolly/
Description: This is not just a plugin, is symbolizes the greatest wrestler of all time.
Author: Aaron Turner
Version: 1.0
Author URI: http://ma.tt/
*/

function john_get_lyric() {
	/** These are the lyrics to Hello Dolly */
	$lyrics = "Y'all 'bout to find God, make you an instant preacher
They should have never let Cena spit with Wiz Khalifa
We all day fam, hotter than a sauna
I'm not from Chi city but I'm common on the corner
We always hustle hard, you ballin' incidental
I'm 'bout to go on trial, murderin' instrumentals
I dumb it down for you, I keep it simple, son
I need four fingers, I'm givin' you the middle one";

	// Here we split it into lines
	$lyrics = explode( "\n", $lyrics );

	// And then randomly choose a line
	return wptexturize( $lyrics[ mt_rand( 0, count( $lyrics ) - 1 ) ] );
}

// This just echoes the chosen line, we'll position it later
function john() {
	$chosen = john_get_lyric();
	echo "<p id='john'>$chosen</p>";
}

// Now we set that function up to execute when the admin_notices action is called
add_action( 'admin_notices', 'john' );

// We need some CSS to position the paragraph
function john_css() {
	// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#john {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;
		margin: 0;
		font-size: 11px;
	}
	</style>
	";
}

add_action( 'admin_head', 'john_css' );

?>
