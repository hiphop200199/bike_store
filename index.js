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
