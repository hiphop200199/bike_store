$(function () {
   
    let sliderIndex = 0;
    let sliderImg = document.querySelectorAll("#image-slider img");
    setInterval(() => {
      sliderImg[sliderIndex].style.transform = "translatex(-10%)";
      sliderImg[sliderIndex].style.opacity = "0";
      oldImgFadeout();
    }, 10000);
   
    
   
    
    function oldImgFadeout() {
      setTimeout(function () {
        sliderImg[sliderIndex].style.display = "none";
        sliderIndex == sliderImg.length - 1 ? (sliderIndex = 0) : sliderIndex++;
        sliderImg[sliderIndex].style.display = "inline";
        sliderImg[sliderIndex].style.transform = "translatex(10%)";
        sliderImg[sliderIndex].style.opacity = "0";
        newImgShowup();
      }, 700);
    }
    
    function newImgShowup() {
      setTimeout(function () {
        sliderImg[sliderIndex].style.transform = "none";
        sliderImg[sliderIndex].style.opacity = "1";
      }, 300);
    }
  });
  