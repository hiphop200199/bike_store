$(function () {
  
   
    let layout = document.getElementById('layout');
    let cartBtn = document.getElementById('cart');
    let closeCart = document.getElementById('close-cart');
    let sideCart = document.getElementById('side-cart');
    let asideMenuBtn = document.getElementById('aside-menu-btn');
    let sideMenu = document.getElementById('side-menu');
    let closeMenu = document.getElementById('close-menu');
    let logout = document.getElementById("logout");
    let sideLogout = document.getElementById("side-logout");
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
    logout.addEventListener('click',e=> handleLogout(e));
    sideLogout.addEventListener('click',e=>handleLogout(e));
    function handleLogout(e){
        e.preventDefault();
        let formInputs = {
            task:'logout'
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
    }
  
    
 
  });
  