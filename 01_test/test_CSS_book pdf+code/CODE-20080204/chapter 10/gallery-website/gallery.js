function swapPhoto(photoSRC,theCaption) {
  var displayedCaption = document.getElementById("caption");
  displayedCaption.firstChild.nodeValue = theCaption;
  document.images.imgPhoto.src = "assets/" + photoSRC;
}