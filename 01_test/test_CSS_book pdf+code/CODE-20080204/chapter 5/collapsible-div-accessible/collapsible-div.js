var cssNode = document.createElement('link');
cssNode.setAttribute('rel', 'stylesheet');
cssNode.setAttribute('type', 'text/css');
cssNode.setAttribute('href', 'javascript-overrides.css');
document.getElementsByTagName('head')[0].appendChild(cssNode);
    

function toggleDiv(targetId)
	{ 
	if (document.getElementById) 
		{ 
		target = document.getElementById(targetId); 
		if (target.style.display == "block") 
			{	 
			target.style.display = "none"; 
			} 
		else 
			{	 
			target.style.display = "block"; 
			} 
		}	 
	} 
