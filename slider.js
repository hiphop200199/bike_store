$(function () {
   
    let popularSlider = document.getElementById('cards');
    let slideLeft = document.getElementById('slide-left');
    let slideRight = document.getElementById('slide-right');
    let slideDistance = 0;
    let cardWidth = 230;
    let sliderIndex = 0;
    let sliderImg = document.querySelectorAll("#image-slider img");
    setInterval(() => {
      sliderImg[sliderIndex].style.transform = "translatex(-10%)";
      sliderImg[sliderIndex].style.opacity = "0";
      oldImgFadeout();
    }, 10000);
   
    slideLeft.addEventListener('click',()=>handleSlide('left'));
    slideRight.addEventListener('click',()=>handleSlide('right'));
   
    
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

    function handleSlide(dir){
      switch(dir){
        case 'left':
          if(Math.sign(cardWidth)==1){
            cardWidth*=-1;
          }
          break;
        case 'right':
          cardWidth = Math.abs(cardWidth);
          if(slideDistance==0){
            return;
          }
          break;
      }
      if(slideDistance==cardWidth*8){
        return;
      }
      slideDistance+=cardWidth;
      popularSlider.style.transform = `translateX(${slideDistance}px)`;
    }
  });
  