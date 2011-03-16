if (navigator.platform.indexOf('Mac')!= -1)
	{
	var cssNode = document.createElement('link');
	cssNode.setAttribute('rel', 'stylesheet');
	cssNode.setAttribute('type', 'text/css');
	cssNode.setAttribute('href', 'mac-hacks.css');
	document.getElementsByTagName('head')[0].appendChild(cssNode);
	}