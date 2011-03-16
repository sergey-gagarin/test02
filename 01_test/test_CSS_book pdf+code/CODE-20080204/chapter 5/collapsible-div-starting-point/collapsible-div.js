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
