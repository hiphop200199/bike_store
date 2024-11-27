$(function(){


    let startEdit = document.getElementById('start-edit');
    let confirmOrCancel = document.getElementById("confirm-or-cancel");
    let confirmEdit = document.getElementById('confirm-edit');
    let changable = document.querySelectorAll('.changable');

    startEdit.addEventListener('click', ()=>{
        for (let index = 0; index < changable.length; index++) {
            changable[index].toggleAttribute('disabled');
        }
        confirmOrCancel.classList.toggle('editing');
    })
    confirmEdit.addEventListener('click',()=>{
        if(!confirm('確認修改會員資料?')){
            return;
        }
        let formInputs = {
            tel:document.querySelector("input[name='tel']").value,
            address:document.querySelector("input[name='address']").value,
            task:'edit-user'
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
              console.log(response);
              if(response['redirect']){
                  setTimeout(() => {
                      location.href =
                      location.origin + "/bike_store/" + response.redirect;
                  }, 1000);
              }
             
            
            },
            error: function (error) {
                console.log(error);
            },
          });
        
    })


});