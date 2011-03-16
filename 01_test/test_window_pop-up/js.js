// JavaScript Document

// for w2_js.php page
function setIDs(){
  
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
 // && doesn't come through !!-ok
 // pids = pids.replace(/\s+/g,"!!"); 
  
  // spaces gos throgh GET - ok! ??? 

window.open('user.php?pids='+pids,'DailyNotification','width=800,height=600,toolbar=no,location=no,directories=no,status=no,menubar=yes,scrollbars=yes,copyhistory=no,resizable=yes');
}


// for w3.php page
 
function go(){
  
  var pids='';
  
  if (document.forms[0].job_pid.checked) 
  { pids+=document.forms[0].job_pid.value;}
  
  if (document.forms[1].job_pid.checked) 
  { pids+=document.forms.length;}
  
  for(i=0;i<document.forms.length;i++){
      if(document.forms[i].job_pid.checked){
      pids+=document.forms[i].job_pid.value;
      pids+=";";
      }
  }


window.open('user.php?pids='+pids,'DailyNotification','width=800,height=600,toolbar=no,location=no,directories=no,status=no,menubar=yes,scrollbars=yes,copyhistory=no,resizable=yes');
}



function goHiddenPost()
{

////////--- read data from checkcoxes
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



// --- put data into hidden field ---------------------------------

var field = document.getElementById('hidden_ids');
field.value = pids;

//field.value = 'hidden value!';          - ok
//document.post_ids.value = 'hidden value!';  - No can't find by name

//document.form.submit();
alert("ids = "+pids);
return true;
}

// can't pass POST any where - use ajax instead
function one(){
// --- open new window and process results ------------------------
window.open('user.php','DailyNotification','width=800,height=600,toolbar=no,location=no,directories=no,status=no,menubar=yes,scrollbars=yes,copyhistory=no,resizable=yes');

}

function goHiddenPost2()
{
////////--- read data from checkcoxes
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
// --- put data into hidden field ---------------------------------
var field = document.getElementById('hidden_ids2');
field.value = pids;
//field.value = 'hidden value!';          - ok
//document.post_ids.value = 'hidden value!';  - No can't find by name

//document.form.submit();
alert("ids = "+pids);
return true;
}

// can't pass POST any where - use ajax instead
function one(){
// --- open new window and process results ------------------------
window.open('user.php','DailyNotification','width=800,height=600,toolbar=no,location=no,directories=no,status=no,menubar=yes,scrollbars=yes,copyhistory=no,resizable=yes');

}









