$(function () {
  
    let productAmount = document.querySelector("#amount input[type='number']").value;
    let productImg = document.getElementById('product-img');
    let addCart = document.getElementById('add-cart');
    let params = new URLSearchParams(location.search);
    let itemBox = document.getElementById('item-box');
    addCart.addEventListener('click',()=>{
        let item = {
            productId:params.get('itemID'),
            name:document.querySelector("#text h1").innerText,
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
        <span>NT$ 115</span>
      </section>
       </div>`;
            itemBox.innerHTML+=itemElementTemplate;
        }

    })
   
   
  
   
    
   
  });
  