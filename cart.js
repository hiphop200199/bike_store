$(function () {
  
    let productAmount = document.querySelector("#amount input[type='number']")?.value;
    let productImg = document.getElementById('product-img');
    let addCart = document.getElementById('add-cart');
    let params = new URLSearchParams(location.search);
    let itemBox = document.getElementById('item-box');
    let cartMessage = document.getElementById('cart-message');
    let totalPrice = document.getElementById('total-price');
    let goCheckout = document.getElementById('go-checkout');
    let keepShopping = document.getElementById('keep-shopping');
    let totalPriceNumber = 0;
    let cartItems = document.getElementById('cart-items');
    let formInputs;
    let same = document.getElementById('receiver-same-with-member');
    let receiverName = document.querySelector('input[name="receiver-name"]');
    let receiverTel = document.querySelector('input[name="receiver-tel"]');
    let receiverAddress = document.querySelector('input[name="receiver-address"]');
    let defaultReceiverName; 
    let defaultReceiverTel;
    let defaultReceiverAddress;
    let startCheckout = document.getElementById('start-checkout');
    
    addCart?.addEventListener('click',()=>{
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
            <button class="remove-item" >🗑</button>
            </section>
            </section>
          <section class="amount-price">
            <label for="">數量：<input type="number" value="${itemsDecoded[index]['amount']}" min="1" ></label>
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
   
    goCheckout.addEventListener('click',()=>{
      location.href =
      location.origin + "/bike_store/views/ready-checkout.php";
    })
   
    keepShopping.addEventListener('click',()=>{
      location.href =
      "/bike_store/views/collection.php?type=New Arrivals&order=date-desc&page=1";
    })
    
    startCheckout?.addEventListener('click',()=>{
      if(!confirm('確認結帳?')){
        return;
      }
      formInputs = {
        receiverName:receiverName.value,
        receiverTel:receiverTel.value,
        receiverAddress:receiverAddress.value,
        data:sessionStorage.getItem('cart'),
        task:'checkout'
      }
      let data = JSON.stringify(formInputs);
      $.ajax({
          type: "POST",
          url: "/bike_store/controllers/order.php",
          data: data,
          contentType: "application/json", //用來標示傳過去的資料格式
          processData: false,
          dataType: "json",
          success: function (response) {
            console.log(response);       
            if(response['url']){
              location.href = response['url'];
            }         
          },
          error: function (error) {
              console.log(error);
          },
        });
    })

    if(cartItems){
      let itemsDecoded = JSON.parse(items);
      for (let index = 0; index < itemsDecoded.length; index++) {
          let item = document.createElement('div');
          item.classList.add('item');
          item.id = `item-${itemsDecoded[index]['productId']}`;
          let itemDetail = document.createElement('section');
          itemDetail.classList.add('item-detail');
          let itemImg = document.createElement('img');
          itemImg.src = itemsDecoded[index]['image'];
          let text = document.createElement('section');
          text.classList.add('text');
          let itemName = document.createElement('h4');
          itemName.innerText =  itemsDecoded[index]['name'];
          let itemPrice = document.createElement('span');
          itemPrice.id = `item-price-${itemsDecoded[index]['productId']}`;
          itemPrice.innerText = `NT$ ${itemsDecoded[index]['price']}`;
          itemRemoveBtn = document.createElement('button');
          itemRemoveBtn.id=`remove-item-${itemsDecoded[index]['productId']}`;
          itemRemoveBtn.innerText = '🗑';
          itemRemoveBtn.addEventListener('click',()=>{removeItem(itemsDecoded[index]['productId'])});
          let amountPrice = document.createElement('section');
          amountPrice.classList.add('amount-price');
          let amountLabel = document.createElement('label');
          amountLabel.innerHTML = '數量：';
          let itemAmount = document.createElement('input');
          itemAmount.id = `item-amount-${itemsDecoded[index]['productId']}`;
          itemAmount.setAttribute('type','number');
          itemAmount.setAttribute('min','1');
          itemAmount.setAttribute('value',`${itemsDecoded[index]['amount']}`);
          itemAmount.addEventListener('change',function(){adjustAmount(itemsDecoded[index]['productId'])});
          let itemTotalPrice = document.createElement('span');
          itemTotalPrice.id = `item-total-price-${itemsDecoded[index]['productId']}`;
          itemTotalPrice.classList.add('item-total-price');
          itemTotalPrice.innerText = `NT$ ${parseInt(itemsDecoded[index]['price']) *parseInt(itemsDecoded[index]['amount'] )}`;
          text.append(itemName,itemPrice,itemRemoveBtn);
          itemDetail.append(itemImg,text);
          amountLabel.append(itemAmount);
          amountPrice.append(amountLabel,itemTotalPrice);
          item.append(itemDetail,amountPrice);
          cartItems.append(item);
      }
      
      let readyPrice = document.createElement('section');
      let combine = document.createElement('span');
      combine.innerText = '合計';
      let readyPriceNumber = document.createElement('strong');
      readyPriceNumber.id = 'ready-price-number';
      readyPriceNumber.innerText = `NT$ ${totalPriceNumber}`;
      readyPrice.append(combine,readyPriceNumber);
      cartItems.append(readyPrice);
      formInputs = {
        task:'get-user'
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
                  defaultReceiverName = response['name'];
                  defaultReceiverTel = response['phone'];
                  defaultReceiverAddress = response['address'];
          },
          error: function (error) {
              console.log(error);
          },
        });
        same.addEventListener('change',()=>{
          if(same.checked){
            receiverName.value = defaultReceiverName;
            receiverTel.value = defaultReceiverTel;
            receiverAddress.value = defaultReceiverAddress;
            return;
          }
          receiverName.value = '';
          receiverTel.value = '';
          receiverAddress.value = '';
        })
    }
    

    function removeItem(id){    
      let items = sessionStorage.getItem('cart');
      let itemsDecoded = JSON.parse(items);
      itemsDecoded = itemsDecoded.filter(item => item.productId!==id);
      let removeItem = document.getElementById(`item-${id}`);
      totalPriceNumber -= parseInt(document.getElementById(`item-price-${id}`).innerText.match(/\d+/))*parseInt(document.getElementById(`item-amount-${id}`).value);
      let readyPriceNumber = document.getElementById('ready-price-number');
      readyPriceNumber.innerText = `NT$ ${totalPriceNumber}`;
      cartItems.removeChild(removeItem);
      sessionStorage.setItem('cart',JSON.stringify(itemsDecoded));
    }
    function adjustAmount(id){
      let items = sessionStorage.getItem('cart');
      let itemsDecoded = JSON.parse(items);
      let adjustItemAmount = document.getElementById(`item-amount-${id}`)
      let adjustItemTotalPrice = document.getElementById(`item-total-price-${id}`);
      totalPriceNumber = 0;
      for(let i=0;i<itemsDecoded.length;i++){
        if(itemsDecoded[i].productId==id){
          itemsDecoded[i].amount = adjustItemAmount.value;
          adjustItemTotalPrice.innerHTML = `NT$ ${parseInt(itemsDecoded[i]['price'])  * parseInt(itemsDecoded[i]['amount'])}`;
        }
        totalPriceNumber += parseInt(itemsDecoded[i]['price'])  * parseInt(itemsDecoded[i]['amount'])

      }
      let readyPriceNumber = document.getElementById('ready-price-number');
      readyPriceNumber.innerText = `NT$ ${totalPriceNumber}`;
      sessionStorage.setItem('cart',JSON.stringify(itemsDecoded));
    }
  });
  