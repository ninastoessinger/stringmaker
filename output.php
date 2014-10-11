<?php

import_request_variables("gp", "");

?>

<!DOCTYPE html>

<head>   
</head>

<body>


<?php
	
	if ($part1 == "custom1") {
			$part1_custom = trim($part1_custom);
			$custom1 = explode(" ", $part1_custom);
	}
	
	if ($part2 == "custom2") {
			$part2_custom = trim($part2_custom);
			$custom2 = explode(" ", $part2_custom);
	}
	
	if ($baseletter == "custom") {
		$baseletter = $base_custom;
	}
	
	$string = "";
	
	foreach ($$part1 as &$letter1) {
		
		$secondpart = ($rev == true) ? $letter1 : "";
		
		if ($class2) {
			foreach ($$part2 as &$letter2) {
				$string .= $baseletter.$letter1.$letter2.$secondpart.$baseletter;
			}
		} else {
			$string .= $baseletter.$letter1.$baseletter;
		}
	}
	
	?>
    
    <div id="output">
    
	<textarea name="outputfield" id="outputfield" spellcheck="false" wrap="soft" style="width: 80%; height: 360px;"><?php
	// it might be nice to make the line-breaking algorithm more intelligent/useful.
	// maybe at least to suggest using line lengths that are a multiple of the pattern length
	if ($linebreaks) {
		if (!isset($linelength)) { $linelength = 50; }
		$lines = str_split($string,$linelength);
		foreach ($lines as &$line) {
			if (($line != "") || ($line != " ")) {
				echo ($line . "\n");	
			}
		}
	} else {
		echo ($string);
	}
	?></textarea>

	</div>

</body>
</html>