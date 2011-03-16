<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html dir="ltr" lang="en">
<head>
<meta http-equiv="Content-Type"
content="text/html; charset=utf-8" />
<title>Search example</title>
<script type="text/javascript">

function checkSearch()
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

<form action="f1_book2.php" method="post" onsubmit="return checkSearch();">
<p>
<label for="search">Search the site:</label>
<input type="text" id="search" name="search" />
<input type="submit" value="Search" />
</p>
</form>



</body>
</html>


