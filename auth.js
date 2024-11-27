$(function(){


    let authForm = document.querySelector('.auth-related');
    let authMessage = document.querySelector('.message');
    authForm.addEventListener('submit',e=>{
        e.preventDefault();
        let mode = document.querySelector('[checked]').id;
        let formInputs = {
            name:document.querySelector("input[name='name']").value,
            email:document.querySelector("input[name='email']").value,
            password:document.querySelector("input[name='password']").value,
            checkPassword:document.querySelector("input[name='check-password']").value,
            tel:document.querySelector("input[name='tel']").value,
            address:document.querySelector("input[name='address']").value,
            task:mode
        }
        let data = JSON.stringify(formInputs);
        $.ajax({
            type: "POST",
            url: "/bike_store/controllers/auth.php",
            data: data,
            contentType: "application/json", //用來標示傳過去的資料格式
            processData: false,
            dataType: "json",
            success: function (response) {
              authMessage.innerText = response.message;
              console.log(response);
              if(response['redirect']){
                  setTimeout(() => {
                      location.href =
                      location.origin + "/bike_store/" + response.redirect;
                  }, 1000);
              }
             
            
            },
            error: function (error) {
                authMessage.innerText = '';
                console.log(error);
            },
          });
    });




});