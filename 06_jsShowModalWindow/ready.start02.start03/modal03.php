

<script src="js/jquery.min.js" type="text/javascript"></script>


<script language="JavaScript">

	$(window).unload( function () 
            { 
    			window.opener.reloadPage();
        	});

	
</script>




</head>
 <body>
 

 <center>
  <div style="background: #ff9900; width:'100%';" 
       align="center">
   <font color="#0000ff" size="12pt">
	<b>Modal page</b>
   </font>
  </div>
  <div id="mydiv"></div>
 </center>
 
<button id="bb">Check ! </button>
 <br>
 
 <a href="modal03.php">Link to itself-- Reload !</a>
 <br><br><br>
 

 
 </body>

</html>