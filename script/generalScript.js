var count = 0;

function SlideShow() {
    var i;
    var handleImg = document.getElementsByClassName("slideShow");
    for (i = 0; i < handleImg.length; i++) {
       handleImg[i].style.display = "none";  
    }
    count++;
    if (count > handleImg.length) {count = 1}    
    handleImg[count-1].style.display = "block";  
    setTimeout(SlideShow, 10000);    
}