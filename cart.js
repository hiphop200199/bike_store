$(function () {
  
    let productAmount = document.querySelector("#amount input[type='number']").value;
    let productImg = document.getElementById('product-img');
    let addCart = document.getElementById('add-cart');
    let params = new URLSearchParams(location.search);
    let itemBox = document.getElementById('item-box');
    let cartMessage = document.getElementById('cart-message');
    let totalPrice = document.getElementById('total-price');
    let goCheckout = document.getElementById('go-checkout');
    let keepShopping = document.getElementById('keep-shopping');
    let totalPriceNumber = 0;
    
    addCart.addEventListener('click',()=>{
        let item = {
            productId:params.get('productID'),
            name:document.querySelector("#text h1").innerText,
            image:productImg.src,
            amount:productAmount,
            price:document.querySelector("#text p strong").innerText
        }
        let items = JSON.parse(sessionStorage.getItem('cart'))||[];
        if(items.find(elem => elem.productId ===item.productId)){
            return;
        }else{
            items.push(item);
            sessionStorage.setItem('cart',JSON.stringify(items));
            let itemElementTemplate = `<div class="item" id="${item.productId}">
        <section class="item-detail">
        <img src="${productImg.src}" alt="">
        <section class="text">
        <h4>${item.name}</h4>
        <span>NT$ ${item.price}</span>
        <button class="remove-item">🗑</button>
        </section>
        </section>
      <section class="amount-price">
        <label for="">數量：<input type="number" value="${item.amount}" min="1"></label>
        <span>NT$ ${item.price}</span>
      </section>
       </div>`;
       totalPriceNumber += parseInt(item.price)  * parseInt(item.amount)
       totalPrice.innerHTML = `
       <span>合計</span> <strong id="total-price-number">NT$ ${totalPriceNumber}</strong>
       `;
            itemBox.innerHTML+=itemElementTemplate;
            cartMessage.innerText = '您的購物車';
            keepShopping.style.display='none';
            totalPrice.style.display='flex';
            goCheckout.style.display='inline';
        }

    })

    let items = sessionStorage.getItem('cart');
    if(items){
        let itemsDecoded = JSON.parse(items);
        for (let index = 0; index < itemsDecoded.length; index++) {
            let itemElementTemplate = `<div class="item" id="${itemsDecoded[index]['productId']}">
            <section class="item-detail">
            <img src="${itemsDecoded[index]['image']}" alt="">
            <section class="text">
            <h4>${itemsDecoded[index]['name']}</h4>
            <span>NT$ ${itemsDecoded[index]['price']}</span>
            <button class="remove-item">🗑</button>
            </section>
            </section>
          <section class="amount-price">
            <label for="">數量：<input type="number" value="${itemsDecoded[index]['amount']}" min="1"></label>
            <span>NT$ ${parseInt(itemsDecoded[index]['price']) *parseInt(itemsDecoded[index]['amount'] )}</span>
          </section>
           </div>`;
          
                itemBox.innerHTML+=itemElementTemplate;
               totalPriceNumber += parseInt(itemsDecoded[index]['price'])  * parseInt(itemsDecoded[index]['amount'])
        }
        totalPrice.innerHTML = `
        <span>合計</span> <strong id="total-price-number">NT$ ${totalPriceNumber}</strong>
        `;
        cartMessage.innerText = '您的購物車';
        keepShopping.style.display='none';
        totalPrice.style.display='flex';
        goCheckout.style.display='inline';
    }
   
  
   
    
   
  });
  