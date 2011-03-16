<html>
<head>
<script type="text/javascript">

function conf()
{
if(!document.getElementById ||
!document.createTextNode){return;}
if(!document.getElementById('search')){return;}
var searchValue=document.getElementById('search').value;
if(searchValue=='')
{
alert('Please enter a search term');
return false;
}
else if(searchValue=='J')
{
var really=confirm('"JavaScript" is a very common term. Do you really want to search for this?');
return really;
}
else
{
return true;

}
}

</script>
</head>
<body>



<form action="f1_book2.php" method="post" onsubmit="return conf();">
<p>
<label for="search">Search the site:</label>
<input type="text" id="search" name="search" />
<input type="submit" value="Search" />
</p>
</form>


</body>
</html>
