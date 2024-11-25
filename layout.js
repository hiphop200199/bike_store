$(function () {
  
   
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
    
  
    
 
  });
  