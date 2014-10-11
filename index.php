<?php
import_request_variables("gp", "");

if (!isset($preview)) {
	$preview = "nnann";
}

# predefined sets
$lc = array("a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z");
$uc = array("A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z");
$fig = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
$punct = array(".", ",", ":", ";", "!", "?", "&bdquo;", "&ldquo;", "&lsquo;", "&rdquo;", "&rsquo;", "*", "&laquo;", "&lsaquo;", "&rsaquo;", "&raquo;", "-", "&ndash;", "&nbsp;", "_", "&amp;", "/", "\\", "(", ")", "[", "]", "{", "}", "|", "@", "#");

?>

<!DOCTYPE html>

<head>
        <meta name="description" content="Stringmaker, a type design tool" />
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
        <link href="master.css" rel="stylesheet" type="text/css" />
    	
    	<title>stringmaker</title>
        
        <script type="text/javascript" src="stringmakerUI.js"></script>
    	        
</head>

<body>

<div id="header"><a href="javascript:showHelp();"><strong>?</strong></a></div>

<div id="help" style="display: none;" onclick="showHelp();">
<p>Stringmaker is a little online tool for generation of test strings that are useful in type design processes, most notably spacing and kerning. Stringmaker can be used to generate basic strings of characters that can then be copy-pasted into font editors or layout applications to test typefaces in progress.</p>

<p style="margin-bottom: 0px;">Tips on working with custom character lists:</p>
<ul style="margin-top: 0px;"><li>Use wordspace-delimited lists for inputting custom characters.</li>
<li>For obvious reasons, Stringmaker is only useful for characters that can be rendered in HTML, and copypasted from the browser.</li>
<li>No need to worry about HTML entities, just enter the characters normally.</li>
</ul>

<p>Made by <a href="http://ninastoessinger.com" target="_blank">Nina St&ouml;ssinger</a> in 2011 (<a href="http://ninastoessinger.com/stringmaker/" target="_blank">original web location</a>). Source posted to GitHub in 2014.</p>
</div>

<form action="index.php" method="post">

<div id="input">

	<h1>stringmaker</h1>

    <p>Pattern preview:
    <input type="text" name="preview" id="preview" value="<?php echo $preview ?>" style="width: 7em;" readonly />
    </p>
  
    
    <p>Select base: 
    <select name="baseletter" id="baseletter" style="width: 6em;" onChange="changeBase(this.value);">
    
    	<?php
			$bases = Array("nn", "oo", "HH", "OO", "11", "00", "custom");
			
			foreach ($bases as &$base) {
				echo ("<option value=\"".$base."\"");
				if ($baseletter == $base) { echo (" selected "); }
				echo (">".$base."</option>");
			}
		?>
    </select> 
    <input type="text" name="base_custom" id="base_custom" value="<?php echo $base_custom ?>" style="width: 2em; <?php if ($baseletter != "custom") { echo ("display: none;"); } ?>" maxlength="2" onChange="changeBaseCustom(this.value);" />
    </p>
    
    <p>Make string to show all 
    <select name="part1" id="part1" style="width: 16em;" onChange="changeFirst(this.value);">
    <?php
			$firstoptions = Array("lc", "uc", "fig", "punct", "custom1");
			$labels = Array("lowercase letters (a&ndash;z)", "uppercase letters (A&ndash;Z)", "numerals (0&ndash;9)", "punctuation (see list:)", "custom...");
			
			for ($i=0; $i<count($firstoptions); $i++) {
				echo ("<option value=\"".$firstoptions[$i]."\"");
				if ($part1 == $firstoptions[$i]) { echo (" selected "); }
				echo (">".$labels[$i]."</option>");
			}
		?>
    </select>
    <input type="text" name="part1_punct" id="part1_punct" value="<?php echo(implode (" ", $punct)); ?>" style="width: <?php echo count($punct)*1.5 ?>em; <?php if ($part1 != "punct") { echo ("display: none;"); } ?>" readonly />
    <input type="text" name="part1_custom" id="part1_custom" value="<?php echo $part1_custom ?>" style="width: 12em; <?php if ($part1_custom == "") { echo ("display: none;"); } ?>" onChange="changeFirstCustom(this.value);" />
    <br />
    
    
    <input type="checkbox" name="class2" id="class2" onChange="activateSecond(this.checked);" <?php if ($class2) { echo ("checked"); } ?> /> next to all 
    <select name="part2" id="part2" style="width: 16em;" onChange="changeSecond(this.value);">
    	
        <?php
			$secondoptions = Array("lc", "uc", "fig", "punct", "custom2");
			$labels = Array("lowercase letters (a&ndash;z)", "uppercase letters (A&ndash;Z)", "numerals (0&ndash;9)", "punctuation (see list:)", "custom...");
			
			for ($i=0; $i<count($secondoptions); $i++) {
				echo ("<option value=\"".$secondoptions[$i]."\"");
				if ($part2 == $secondoptions[$i]) { echo (" selected "); }
				echo (">".$labels[$i]."</option>");
			}
		?>
        
        
    </select>
    <input type="text" name="part2_punct" id="part2_punct" value="<?php echo(implode (" ", $punct)); ?>" style="width: <?php echo count($punct)*1.5 ?>em; <?php if ($part2 != "punct") { echo ("display: none;"); } ?>" readonly />
    <input type="text" name="part2_custom" id="part2_custom" value="<?php echo $part2_custom ?>" style="width: 12em; <?php if ($part2_custom == "") { echo ("display: none;"); } ?>" onChange="changeSecondCustom(this.value);"/>
    <br />
    
    
    <input type="checkbox" name="rev" id="rev" onChange="activateMirror(this.checked);" <?php if (!$class2) { echo ("disabled"); }  if ($rev) { echo ("checked"); } ?> /> and vice versa</p>
    
    
  	<p><input type="checkbox" name="linebreaks" /> Break string into lines of <input type="text" name="linelength" value="50" style="width: 2em;" /> characters</p>
    
    <input type="submit" value="make" /><br /><br />
    
    </div>
    
    <?php
	if (isset($baseletter)) {	// output
		include("output.php");
	}
	
	?>
    
    
</form>

</body>

</html>