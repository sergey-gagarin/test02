// JavaScript Document


$(document).ready(function(){
    
	$('window').unload( function () { alert("window Bye now!"); } );
	
	//$('body').unload( function () { alert("Bye now!"); } );
	
	$('#bb').click( function(){ alert("Button!"); });

});


//$(window).unload(function() { 	  alert('Handler for .unload() called.'); 	});
//<onload="return showDialogArgs();" onbeforeunload="alert('Closing');" - This bit work good for clicking on links as well !!! >
//<body onunload="URL = unescape(window.opener.location.pathname); window.opener.location.href = URL; ">

