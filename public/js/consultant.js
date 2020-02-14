var insights = document.querySelector(".random").offsetTop;
window.onscroll = function() {
  if (window.pageYOffset > 0) {
 var opac = (window.pageYOffset / insights * 3);
   // console.log(opac);
    document.querySelector(".dash-home").style.background = "linear-gradient(rgba(255, 255, 255, " + opac + "), rgba(255, 255, 255, " + opac + ")), url('/images//portal/naturePic.jpg') no-repeat ";
    document.querySelector(".dash-home").style.backgroundAttachment = "fixed"; 
    document.querySelector(".dash-home").style.backgroundPosition = "bottom";
    document.querySelector(".dash-home").style.backgroundSize = "cover";

  }
}