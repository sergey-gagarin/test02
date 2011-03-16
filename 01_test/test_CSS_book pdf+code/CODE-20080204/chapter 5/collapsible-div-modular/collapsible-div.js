var cssNode = document.createElement('link');
cssNode.setAttribute('rel', 'stylesheet');
cssNode.setAttribute('type', 'text/css');
cssNode.setAttribute('href', 'javascript-overrides.css');
document.getElementsByTagName('head')[0].appendChild(cssNode);
    

function toggle(toggler) 
	{
	if(document.getElementById) 
		{
    	targetElement = toggler.parentNode.nextSibling;
		
	    if(targetElement.className == undefined) 
	    	{
      		targetElement = toggler.parentNode.nextSibling.nextSibling;	
    		}		
    	if (targetElement.style.display == "block") 
    		{
      		targetElement.style.display = "none";
    		}
    	else 
    		{
      		targetElement.style.display = "block";
      		}
	  	}
	}