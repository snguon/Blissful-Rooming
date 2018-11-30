var xmlhttp;

// this function gets the file specified in the url
function loadXMLDoc(url, cssId){
	xmlhttp=null;
	if (window.XMLHttpRequest) {// code for Firefox, Opera, IE7, etc.
	  xmlhttp=new XMLHttpRequest();
  } else if (window.ActiveXObject){// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
	
	if (xmlhttp!=null){
		//xmlhttp.onreadystatechange=state_Change();
                xmlhttp.onreadystatechange = function() {state_Change(cssId);};
		xmlhttp.open("GET",url,true);
		xmlhttp.send(null);
  } else {
		alert("Your browser does not support XMLHTTP.");
  }
}

function state_Change(cssId){
	if (xmlhttp.readyState==4){// 4 = "loaded"
	  if (xmlhttp.status==200){// 200 = "OK"
	    document.getElementById(cssId).innerHTML=xmlhttp.responseText;
   	} else {
    	alert("Problem retrieving data:" + xmlhttp.statusText);
    }
  }
}