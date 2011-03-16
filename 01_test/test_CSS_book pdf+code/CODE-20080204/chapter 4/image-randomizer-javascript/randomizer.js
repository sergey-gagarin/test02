var chosenImage=new Array();
chosenImage[0]="stream.jpg";
chosenImage[1]="river.jpg";
chosenImage[2]="road.jpg";

var chosenAltCopy=new Array();
chosenAltCopy[0]="A stream in Iceland";
chosenAltCopy[1]="A river in Skaftafell, Iceland";
chosenAltCopy[2]="A near-deserted road in Iceland";

var getRan=Math.floor(Math.random()*chosenImage.length);

function randomImage()
{
document.getElementById('randomImage').setAttribute('src','assets/random-images/'+chosenImage[getRan]);
document.getElementById('randomImage').setAttribute('alt',chosenAltCopy[getRan]);
}