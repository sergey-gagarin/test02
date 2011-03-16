// JavaScript Document

//Create a boolean variable to check for a valid Internet Explorer instance.
var xmlhttp = false;
//Check if we are using IE.
try {
//If the Javascript version is greater than 5.
xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
//alert ("You are using Microsoft Internet Explorer.");
} catch (e) {
//If not, then use the older active x object.
try {
//If we are using Internet Explorer.
xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
//alert ("You are using Microsoft Internet Explorer");
} catch (E) {
//Else we must be using a non-IE browser.
xmlhttp = false;
}
}
//If we are using a non-IE browser, create a javascript instance of the object.
if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
xmlhttp = new XMLHttpRequest();
//alert ("You are not using Microsoft Internet Explorer");
}

function makerequest(serverPage, objID) {
    var obj = document.getElementById(objID);
    xmlhttp.open("GET", serverPage);
    xmlhttp.onreadystatechange = function() {
          if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
              obj.innerHTML = xmlhttp.responseText;
              }
    }
xmlhttp.send(null);
}

function makerequest2(serverPage) {
 
    ////////--- read data from checkcoxes = pid - print job ids
  var pids='';
 
    for(i=0;i<document.forms.length;i++){
  // check if checkbox exists in the form
    if(document.forms[i].job_pid){
      if(document.forms[i].job_pid.checked){
      pids+=document.forms[i].job_pid.value;
      pids+=";";
      }
    }
    }

    
    
    var params = "ids="+pids; 
    xmlhttp.open("POST", serverPage, true);
    
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.setRequestHeader("Content-length", params.length);
    xmlhttp.setRequestHeader("Connection", "close");
    
    xmlhttp.onreadystatechange = function() {
          if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
             
            //  myWindow = window.open('','DailyNotification','width=1200,height=800,toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,copyhistory=no,resizable=yes');
              myWindow = window.open('','DailyNotification','width=1200,height=800,toolbar=no,location=no,directories=no,status=no,menubar=yes,scrollbars=yes,copyhistory=no,resizable=yes');
              myWindow.document.write(xmlhttp.responseText);
              myWindow.document.close();
              myWindow.focus();
              }
    }
xmlhttp.send(params);
}


