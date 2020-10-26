if(document.querySelector('.dash-home') !== null){
 
  
    var insights = document.querySelector(".random").offsetTop;
    
    
window.onscroll = function() {
  
  if (window.pageYOffset > 0) {
 var opac = (window.pageYOffset / insights * 3);
    
    document.querySelector(".dash-home").style.background = "linear-gradient(rgba(255, 255, 255, " + opac + "), rgba(255, 255, 255, " + opac + ")), url('/images//portal/naturePic.jpg') no-repeat ";
    document.querySelector(".dash-home").style.backgroundAttachment = "fixed"; 
    document.querySelector(".dash-home").style.backgroundPosition = "bottom";
    document.querySelector(".dash-home").style.backgroundSize = "cover";

  }
}

}




    var tabs = document.getElementsByClassName('tab-item');
  // console.log(tabs);
    var i;
     for(i=1; i< tabs.length; i++){
         var menu = tabs[i].parentElement;
        // console.log(menu);
         
        tabs[i].addEventListener("click", accordion);
        menu.addEventListener("mouseover", accordionDrop, false);
        menu.addEventListener("mouseout", accordionClose, false);
     }
     function accordion () {
        
         
         var acc;
         if(this.nextElementSibling){
            acc =  this.nextElementSibling;
         } else{
            acc =  this.lastChild;
            console.log("hihi");
            
         }
      //  var acc =  this.nextElementSibling;
      /*  if (acc.style.display === "block") {
         acc.style.display = "none";
       } else {
         acc.style.display = "block";
       }*/
       if (acc.style.maxHeight) {
        acc.style.maxHeight = null;
      } else {
        acc.style.maxHeight = acc.scrollHeight + "px";
      } 
     
    }
    function accordionDrop () {
        var acc = this.lastChild;
        
        //console.log(acc + 'dvchdv');
        
       
     //  var acc =  this.nextElementSibling;
     /*  if (acc.style.display === "block") {
        acc.style.display = "none";
      } else {
        acc.style.display = "block";
      }*/
      
       acc.style.maxHeight = acc.scrollHeight + "px";
    
    
   }
   function accordionClose () {
    var acc = this.lastChild;
    //console.log(acc + 'dvchdv');
    
   
 //  var acc =  this.nextElementSibling;
 /*  if (acc.style.display === "block") {
    acc.style.display = "none";
  } else {
    acc.style.display = "block";
  }*/
  
   acc.style.maxHeight = null;


}

///file upload


const actualBtn = document.getElementById('fileToUpload');

const fileChosen = document.getElementById('file-name');

actualBtn.addEventListener('change', function(){
  fileChosen.textContent = this.files[0].name
})


 
    
