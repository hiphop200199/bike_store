$(function(){

   
    let authForm = document.querySelector('.auth-related');
    let authMessage = document.querySelector('.message');
    authForm.addEventListener('submit',e=>{
        e.preventDefault();
        
        let email = document.querySelector("input[name='email']").value;
        let password = document.querySelector("input[name='password']").value;
        let inputRadios =  document.querySelectorAll('input[type="radio"]');
        let mode;
        let formInputs;
        for (let index = 0; index < inputRadios.length; index++) {
          if(inputRadios[index].checked === true){
            mode = inputRadios[index].id;
          }           
        }
        if(!email){
            authMessage='請填寫email';
            return;
        }
        if(!password){
            authMessage='請填寫密碼';
            return;
        }
        switch (mode) {
            case 'register':
                let name = document.querySelector("input[name='name']").value;
                let checkPassword = document.querySelector("input[name='check-password']").value;
                let phone = document.querySelector("input[name='tel']").value;
                let address = document.querySelector("input[name='address']").value;
                if(!name){
                    authMessage='請填寫姓名';
                    return;
                }
                if(name.length>100){
                    authMessage='姓名過長';
                    return;
                }
               
                if(!checkPassword){
                    authMessage='請填寫確認密碼';
                    return;
                }
                let regex = /[A-Z]{1,}[a-z]{1,}[0-9]{1,}\W{1,}/;
                if(!regex.test(password)||!regex.test(checkPassword)){
                    authMessage='密碼須結合大小寫英文字母及數字以及特殊符號至少一個';
                    return;
                }
                if(password!==checkPassword && password!=='' && checkPassword!==''){
                    authMessage.innerText = '請確認密碼是否相符';
                    return;
                }
                if(!phone){
                    authMessage='請填寫電話';
                    return;
                }
                if(!address){
                    authMessage='請填寫地址';
                    return;
                }
                formInputs = {
                    name:name,
                    email:email,
                    password:password,
                    checkPassword:checkPassword,
                    phone:phone,
                    address:address,
                    task:mode
                }
                break;
        
          case 'login':
                formInputs = {
                    email:email,
                    password:password,
                    task:mode
                }
                break;
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