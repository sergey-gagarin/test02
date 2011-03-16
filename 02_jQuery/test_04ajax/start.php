<!doctype html>
<html>
  <head>
  <link href="styles.css" rel="stylesheet" type="text/css">
   <script src="jquery.min.js" type="text/javascript"></script>
   <script src="click.js" type="text/javascript"></script>
    
  </head>
  
  <body>
       
    <p class="square">
     Some info which should have bg
    </p>  <button>Change color</button>   <br><br>
    
    
        <input type="submit" value="load()" id="load_basic" />
				<input type="submit" value="load() #DOM" id="load_dom" />
				<input type="submit" value="load() GET" id="load_get" />
				<input type="submit" value="load() POST" id="load_post" />
				<input type="submit" value="load() callback" id="load_callback" />
				<input type="submit" value=".get" id="getJSON" />
    
    
      <div id="resultDIV">
				    <table border="1">
				        <tr><td>Load into td results</td><td id="result1"><input  type="text" value="result input"></td></tr>
				        <tr><td>Load into input results</td><td><input id="result2" type="text" value="result input"></td></tr>
				        <tr><td>Load GET results</td><td id="result_get">press load GET()</td></tr>
				        <tr><td>Load POST results
                         <input type="text" value="English" id="postvar">
                         </td><td id="result_post">press load POST()</td></tr>
                         
                <tr><td>Load JSON</td><td id="result_JSON">press JSON</td></tr>         
				    </table>
			</div>
    
    <div style="width:100px; height:100px; background: green; float:left;">   </div>
    <div style="width:100px; height:100px; background: yellow; float:left;">   </div>
    <div style="width:100px; height:100px; background: blue; float:left;">   </div>
    
    
  </body>
</html>

