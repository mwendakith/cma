window.onload = initForms;

function initForms() {
	//loop through all forms in the document
	for (var i=0; i< document.forms.length; i++) {
		//validates form if submit button is clicked (on submit)
		document.forms[i].onsubmit = function() {return validForm();}
	}
}

function validForm() {
	//allGood stores the bool value of whether or not the form is okay
	var allGood = true;
	//all tags is all the tags in the document(because fo the *)
	var allTags = document.getElementsByTagName("*");

	//loops through all the tags in the document
	for (var i=0; i<allTags.length; i++) {
		//calls validTag which returns whether or not the tag is valid
		if (!validTag(allTags[i])) {
			//if any tags is not valid allGood is false
			allGood = false;
		}
	}
	alert("all good is " + allGood);
	return allGood;

	function validTag(thisTag) {
		var outClass = "";
		//all the classes within the tag split by spaces to an array
		var allClasses = thisTag.className.split(" ");
	
		//loops though all the classes within the tag
		for (var j=0; j<allClasses.length; j++) {
			//generates new class based on certain conditions
			outClass += validBasedOnClass(allClasses[j]) + " ";
		}
		//sets the tags class to the generated class
		thisTag.className = outClass;
		alert("outclass is " + outClass + "and outClass.indexOf(invalid) > -1 is " + outClass.indexOf("invalid") > -1);
	
		//if the word invalid is present in the class
		if (outClass.indexOf("invalid") > -1) {
			invalidLabel(thisTag.parentNode);
			thisTag.focus();
			if (thisTag.nodeName == "INPUT") {
				thisTag.select();
			}
			return false;
		}
		return true;
		
		//validates class
		function validBasedOnClass(thisClass) {
			var classBack = "";
		
			switch(thisClass) {
				case "":
				case "invalid":
					break;
				case "reqd":
				//if it is required and its value is empty " " then return the class as invalid
					if (allGood && thisTag.value == "") {
						classBack = "invalid ";
					}
					//add invalid to the classes
					classBack += thisClass;
					break;
				case "radio":
				//if it is a radio button and none of the radio button is clicked the class is set to invalid
					if (allGood && !radioPicked(thisTag.name)) {
						classBack = "invalid ";
					}
					classBack += thisClass;
					break;
				case "email":
				//if email nothing happens
					classBack += thisClass;
					break;
				default:
					if (allGood && !crossCheck(thisTag,thisClass)) {
						classBack = "invalid ";
					}
					classBack += thisClass;
			}
			//class back is now the original class plus any added class based on certain conditions
			return classBack;
		}
				
		function crossCheck(inTag,otherFieldID) {
			if (!document.getElementById(otherFieldID)) {
				return false;
			}
			return (inTag.value == document.getElementById(otherFieldID).value);
		}
		
		function radioPicked(radioName) {
			var radioSet = "";

			//loops through all the forms in the doc
			for (var k=0; k<document.forms.length; k++) {
				if (!radioSet) {
					//set the radio set to the one supplied when the function is called
					radioSet = document.forms[k][radioName];
				}
			}
			if (!radioSet) return false;
			//loops throught all the radios in the radio set
			for (k=0; k<radioSet.length; k++) {
				//if any of the radio buttons is set
				if (radioSet[k].checked) {
					return true;
				}
			}
			return false;
		}
		
		function invalidLabel(parentTag) {
			if (parentTag.nodeName == "LABEL") {
				parentTag.className += " invalid";
			}
		}
	}
}

