$(function () {
  //ready function

  /* $("#login-form").on("submit", function (e) {
    e.preventDefault();
    $("#login-message").text("loading...");
    let formInputs = {
      email: $("#login-form input[type='email']").val(),
      password: $("#login-form input[type='password']").val(),
      task: "login",
    };
    let data = JSON.stringify(formInputs);
    $.ajax({
      type: "POST",
      url: "auth.php",
      data: data,
      contentType: "application/json", //用來標示傳過去的資料格式
      processData: false,
      dataType: "json",
      success: function (response) {
        $("#login-message").text(response.message);
        console.log(response);
        if (response["redirect"]) {
          setTimeout(() => {
            location.href =
              location.origin +
              "/document_management_system/" +
              response.redirect;
          }, 1000);
        }
      },
      error: function (error) {
        $("#login-message").text("");
        console.log(error);
      },
    });
  }); */
  let sliderIndex = 0;
  let sliderImg = document.querySelectorAll("#image-slider img");
  setInterval(() => {
    sliderImg[sliderIndex].style.transform = "translatex(-10%)";
    sliderImg[sliderIndex].style.opacity = "0";
    oldImgFadeout();
  }, 10000);
  let layout = document.getElementById('layout');
  let cartBtn = document.getElementById('cart');
  let closeCart = document.getElementById('close-cart');
  let sideCart = document.getElementById('side-cart');
  let asideMenuBtn = document.getElementById('aside-menu-btn');
  let sideMenu = document.getElementById('side-menu');
  let closeMenu = document.getElementById('close-menu');
  cartBtn.addEventListener('click',()=>{
    sideCart.classList.toggle('active');
    layout.style.filter = 'sepia(0.9) brightness(0.6)';
  }
    );
  closeCart.addEventListener('click',()=>{
    sideCart.classList.remove('active');
    layout.style.filter = 'none';
  }
   );
  closeMenu.addEventListener('click',()=>{
    sideMenu.classList.remove('active');
    layout.style.filter = 'none';
  });
  layout.addEventListener('click',(e)=> {
    console.log(e.target)
    if(e.target.id ==='cart' || e.target.alt ==='cart'||e.target.id==='aside-menu-btn'||e.target.id==='aside-menu-pic'){
      return;
    }else{
      sideCart.classList.remove('active');
      sideMenu.classList.remove('active');
      layout.style.filter = 'none';
    }
  });
  asideMenuBtn.addEventListener('click',()=>{
    sideMenu.classList.toggle('active');
    layout.style.filter ==='sepia(0.9) brightness(0.6)'?layout.style.filter='none': layout.style.filter ='sepia(0.9) brightness(0.6)';
  })
  
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
