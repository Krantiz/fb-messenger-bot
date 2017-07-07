<?php

/**
 * PHP Array for Removing words from filter words
 */

$deleteKeyIfExists = ['ass', 'hell', 'anal'];

foreach($deleteKeyIfExists as $entry){

	$foundEntry = array_search($entry, $badwords);

	// Remove the element
	if(!isset($badwords['foundEntry']))
		$badwords[$foundEntry] = '';
}