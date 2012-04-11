/**
 * Rules.js
 * 
 * @author A.J. Fite
 * @copyright Copyright 2012 A.J. Fite
 */

/**
 * Following 2 functions expand and collapse the rules
 */
function show(sec) {
    var item = document.getElementById('Section'+sec);
    var ol = item.getElementsByTagName('ol')[0];
    if(ol.style.display != "inherit") {
	//Make things visible
	ol.style.display = "inherit";
	ol.style.visibility = "visible";
	item.getElementsByTagName('img')[0].src = "Assets/Images/Shrink.png";
    } else {
	//Make things hidden
	ol.style.display = "none";
	ol.style.visibility = "collapse";
	item.getElementsByTagName('img')[0].src = "Assets/Images/Expand.png";
    }

}