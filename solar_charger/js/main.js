var i=0;
var slidesimg=["cruds/1.jpg","cruds/2.jpg","cruds/3.jpg"];

 

var slideshow=function() {
     document.slideshow.src = slidesimg [i];
      

     if(0< slidesimg.length-1 )
     {
         i++;
     }
     else{
         i=0;
     }

     setTimeou("slideshow()",2000);
}

   slideshow()






