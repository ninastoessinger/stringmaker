var testletters = new Array();
	testletters["lc"] = "a";
	testletters["uc"] = "A";
	testletters["punct"] = "!";
	testletters["fig"] = "2";


function changeBase(newbase) {
	var oldstring = document.getElementById("preview").value;
	var oldbase = oldstring.substr(0,2);
	
	if (newbase != "custom") {	// behavior for standard sets
		var newstring = oldstring;
		while(newstring.indexOf(oldbase) != -1) {
		   newstring = newstring.replace(oldbase, newbase);
		} 
		document.getElementById("preview").value = newstring;
		document.getElementById("base_custom").style.display = "none";
	} else {
		document.getElementById("base_custom").style.display = "inline";
		if (document.getElementById("base_custom").value != "") {
			changeBaseCustom(document.getElementById("base_custom").value);
		}
	}
}


function changeBaseCustom(newBaseCustom) {
	newBaseCustom = newBaseCustom.replace (/^\s+/, '').replace (/\s+$/, ''); // trim whitespace
	var newbase = newBaseCustom.substr(0,2);
	var oldstring = document.getElementById("preview").value;
	var oldbase = oldstring.substr(0,2);
	var newstring = oldstring;
	while(newstring.indexOf(oldbase) != -1) {
		newstring = newstring.replace(oldbase, newbase);
	} 	
	document.getElementById("preview").value = newstring;
}


function changeFirst(newFirstKind) {
	document.getElementById("part1_punct").style.display = (newFirstKind == "punct") ? "inline" : "none";
	
	if (newFirstKind != "custom1") { 
	
		newfirst = testletters[newFirstKind];	
		var oldstring = document.getElementById("preview").value;
		var newstring = oldstring.substr(0,2) + newfirst + oldstring.substr(3);
		
		if (document.getElementById("rev").checked) { // show a second time?
			newstring = newstring.substr(0,4) + newfirst + newstring.substr(5);
		}
		document.getElementById("preview").value = newstring;
		
		if (document.getElementById("part1_custom").style.display != "none") {
			document.getElementById("part1_custom").style.display = "none";
		}
		
	} else {
		document.getElementById("part1_custom").style.display = "inline";
		if (document.getElementById("part1_custom").value != "") {	// if custom string entered
			changeFirstCustom(document.getElementById("part1_custom").value);
		}
	}
}


function changeFirstCustom(newFirstCustom) {

	newFirstCustom = newFirstCustom.replace (/^\s+/, '').replace (/\s+$/, ''); // trim whitespace
	newfirst = newFirstCustom.substr(0,1);
	var oldstring = document.getElementById("preview").value;
	var newstring = oldstring.substr(0,2) + newfirst + oldstring.substr(3);
	  
	if (document.getElementById("rev").checked) { // show a second time?
		newstring = newstring.substr(0,4) + newfirst + newstring.substr(5);
	}
	document.getElementById("preview").value = newstring;
}


function activateSecond(dir) {
	
	var oldstring = document.getElementById("preview").value;
	
	if (dir == true) {
		if (document.getElementById("part2").value != "custom2") {
			var newsecond = testletters[document.getElementById("part2").value];
		} else {
			if (document.getElementById("part2_custom").value != "") {
				var newsecond = document.getElementById("part2_custom").value.substr(0,1);
			} else {
				var newsecond = "x";	
			}
		}
		var newstring = oldstring.substr(0,3) + newsecond + oldstring.substr(3);
			
		document.getElementById("rev").disabled = false;
		
	} else {
		document.getElementById("rev").disabled = true;
		
		if (document.getElementById("rev").checked) {
			var newstring = oldstring.substr(0,3) + oldstring.substr(5);
			document.getElementById("rev").checked = false;		
		} else {
			var newstring = oldstring.substr(0,3) + oldstring.substr(4);
		}
	}
	document.getElementById("preview").value = newstring;
}


function changeSecond(newSecondKind) {

	document.getElementById("part2_punct").style.display = (newSecondKind == "punct") ? "inline" : "none";
	
	if (newSecondKind != "custom2") {	// behavior for standard sets
		if (document.getElementById("class2").checked) {
			newsecond = testletters[newSecondKind];
			var oldstring = document.getElementById("preview").value;
			var newstring = oldstring.substr(0,3) + newsecond + oldstring.substr(4);
			document.getElementById("preview").value = newstring;
		}
			
		if (document.getElementById("part2_custom").style.display != "none") {
			document.getElementById("part2_custom").style.display = "none";
		}
	} else {
		document.getElementById("part2_custom").style.display = "inline";
		
		if (document.getElementById("part2_custom").value != "") {	// if custom string entered
			changeSecondCustom(document.getElementById("part2_custom").value);
		}
	}
}


function changeSecondCustom(newSecondCustom) {
	
	if (document.getElementById("class2").checked) {
		newSecondCustom = newSecondCustom.replace (/^\s+/, '').replace (/\s+$/, ''); // trim whitespace
		
		newsecond = newSecondCustom.substr(0,1);
		  
		var oldstring = document.getElementById("preview").value;
		var newstring = oldstring.substr(0,3) + newsecond + oldstring.substr(4);
		  
		document.getElementById("preview").value = newstring;
	}
}


function activateMirror(dir) {
	if (document.getElementById("class2").checked) {
		var oldstring = document.getElementById("preview").value;
		
		if (dir == true) {
			var existingFirst = oldstring.charAt(2);
			var newstring = oldstring.substr(0,4) + existingFirst + oldstring.substr(4);
		} else {
			var newstring = oldstring.substr(0,4) + oldstring.substr(5);	
		}
		document.getElementById("preview").value = newstring;
	}
}


function showHelp() {
	var d = document.getElementById("help").style.display;
	document.getElementById("help").style.display = (d == "none") ? "block" : "none";
}
