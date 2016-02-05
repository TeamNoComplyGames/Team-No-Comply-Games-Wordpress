<?php
/**
 * @package John_Cena
 * @version 1.6
 */
/*
Plugin Name: John Cena Lyrics
Plugin URI: http://wordpress.org/plugins/hello-dolly/
Description: This is not just a plugin, is symbolizes the greatest wrestler of all time.
Author: Aaron Turner
Version: 1.1.1
Author URI: https://aaronthedev.com/#/
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
I need four fingers, I'm givin' you the middle one
Your time is up, my time is now
You can't see me, my time is now
It's the franchise, boy I'm shining now
You can't see me, my time is now!
In case you forgot or fell off I'm still hot, knock your shell off
My money stack fat plus I can't turn the swell off
The franchise, doing big business, I live this
It's automatic I win this oh you hear those horns, you finished
A soldier, and I stay under you fighting
Plus I'm storming on you chumps like I'm thunder and lightning
Ain't no way you breaking me kid, I'm harder than nails
Plus I keep it on lock, like I'm part of the jail
I'm slaughtering stale competition, I got the whole block wishing
They could run with my division but they gone fishing
With no bait, kid your boy hold weight
I got my soul straight, I brush your mouth like Colgate
In any weather I'm never better your boy's so hot
You'll never catch me in the next man's sweater
If they hate, let 'em hate, I drop ya whole clan
Lay yo' ass down for the three second count
Word life! This is basic thugonomics
This is ba-basic thugomoics
Whether fightin, or spittin, my discipline is unforgiven
Got you backin up, in a defensive position
An ass-kickin anthem, heavyweight or bantam
Holdin camps for ransom, the microphone phantom
Teams hit the floor, this the new fight joint
Like a broken needle kid, you missin the point!
We dominate your conference with offense that's no nonsense
My theme song hits, get your reinforcements!
We strike quick with hard kicks, duckin night sticks
Bare-knuckle men through fight pits, beat you lifeless
Never survive this! Get forget like Alzheimer's
Two-face rappers, walk away with four shiners
The raw rhymer, turnin legends to old-timers
My incisor's like a viper, bitin through your one-liners!
New Deadman Inc. - and we about to make you famous
Takin over Earth and still kickin' in Uranus!
Excuse me for a minute while I lighten the mood
Just clap with me like the lightning do, yeah
A bit of soul food that you be bitin into
And if you feel me then I'm writin for you, uh-huh
Right now put another coat of wax on the ride
For a minute put the beef and the gats to the side
Cause this track's got a vibe to chill to
Enjoy life for 5 minutes, man it's not gon' kill you
It's okay to be hard and stay true man
But at the end of the day, we all hu-man
This one's for you, the ones that you close to
Show some love, it's what you supposed to
Right now, forget the ends and the Benz
Pop a cold one, man toast it wit'cha real friends
Call your folks, tell 'em you tight now
Cause everything lookin pretty good right now
We keep it hoppin like the cars with the shocks
We spittin heat on your block
We new to the game, but runnin the spot
Numbin your knot, with basslines that'll make ya neck break
This rook'll take your queen and put ya king in checkmate
Open your mind without makin ya meditate
We real champs; y'all just featherweight
Time to get it straight, I push your wig back
Crew loaded up with extra bread like a Big Mac
Beefin with us? We're leavin you face down
Stompin bitch rappers like I'm straight outta A-Town
Runnin the playground like it was a track meet
Shoes on the whip that be bigger than Shaq's feet
We into big things, bank account's overgrown
All types of cheese - swiss, cheddar, provolone
Guaranteed to burn wax like candles
Track hittin hard to the head like shots of Jack Daniels
Y'all, bitch, crews, don't wanna fuck with us
Y'all bound, to, lose, another one bites the dust
I got punks, dumps and switches, dump chumpses bitches
We feed you to the sharks, you can sleep with the fishes
Clean you like dishes but I ain't no busboy
You ain't family, you ain't earnin my trust boy
Seen too many bitches that'll double cross ya
We bring more drama than the Laker roster
Get the click pissed, ain't nobody can save ya
Throw heat without lookin like Fernando Valenzuela";

	// Here we split it into lines
	$lyrics = explode( "\n", $lyrics );

	// And then randomly choose a line
	$bar = mt_rand( 1, count( $lyrics ) - 2 );
	return wptexturize( $lyrics[ $bar ].",  ".$lyrics[ $bar + 1 ]);
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
