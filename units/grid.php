<?php

function creatureGrid($creature_results=false)
{
	global $site_root; // from global.php
	
	//If result is empty do a query
	if( $creature_results == false ){
		$creature_results = get_creatures();
	}
	
echo '<style type="text/css">';

	foreach ($creature_results as $r) {
		if ($r['id'] == 0 ) { continue; } //Ignore Dark Priest
		echo '.vignette.type' .$r['realm'].$r['lvl']. '{background-image: url("' .$site_root. 'units/avatars/' .$r["name"]. '.jpg");}';
	}

	echo '
	.vignette.type--.p0{background-image: url("' .$site_root. 'units/avatars/Dark Priest red.jpg");}
	.vignette.type--.p1{background-image: url("' .$site_root. 'units/avatars/Dark Priest blue.jpg");}
	.vignette.type--.p2{background-image: url("' .$site_root. 'units/avatars/Dark Priest orange.jpg");}
	.vignette.type--.p3{background-image: url("' .$site_root. 'units/avatars/Dark Priest green.jpg");}';

	echo '</style><div id="creaturegrid">';

	foreach ($creature_results as $r) {
		if ($r['id'] == 0 || $r['id'] == 50) { //Ignore Dark Priest and Shadow Leech
			continue;
		}
		$underscore = str_replace(' ', '_', $r['name']);
		echo '<a href="#'.$underscore.'" class="vignette realm'.$r['realm'].' type'.$r['realm'].$r['lvl'].'" creature="'.$r['realm'].$r['lvl'].'"><div class="tooltip"><div class="content">'.$r['name'].'</div></div><div class="overlay"></div><div class="border"></div></a>';
	} 

	echo '</div>';
}

?>
