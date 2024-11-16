<script setup>
import LoadingAnimation from '@/components/LoadingAnimation.vue'
import { useAuthStore, useCartStore } from '@/stores/store'
import { onMounted, ref } from 'vue'

const cartStore = useCartStore()
const authStore = useAuthStore()
const receiverName = ref('')
const receiverTel = ref('')
const receiverAddress = ref('')
const same = ref(null)
const message = ref(null)
const adjustAmount = (id, amount) => {
  cartStore.adjustAmount(id, amount)
}
const removeItem = (id) => {
  cartStore.removeItem(id)
}
const handleCheckout = () => {
  if (receiverName.value === '' || receiverAddress.value === '' || receiverTel.value === '') {
    message.value.innerText = '請填寫收件人資料.'
    return
  } else {
    message.value.innerText = ''
    cartStore.handleCheckout(receiverName.value, receiverTel.value, receiverAddress.value)
  }
}
let sameWithUser
cartStore.getItems()
onMounted(() => {
  sameWithUser = () => {
    if (same.value.checked) {
      receiverName.value = authStore.user.name
      receiverTel.value = authStore.user.phone
      receiverAddress.value = authStore.user.address
    } else {
      receiverName.value = ''
      receiverTel.value = ''
      receiverAddress.value = ''
    }
  }
})
</script>

<template>
  <div id="cart-container">
    <h1 id="list">購物車清單</h1>
    <loading-animation v-if="cartStore.isLoading"></loading-animation>
    <div v-else>
      <div class="product-box">
        <div
          class="product-card"
          v-for="(item, index) in cartStore.items"
          :key="index"
          :id="item.id"
        >
          <img class="product-cover" :src="item.image_source" alt="" />
          <p class="product-title">{{ item.name }}</p>
          <p class="product-price">${{ item.price }}元</p>
          <label for="amount"
            >數量:<input
              type="number"
              id="amount"
              min="1"
              v-model="item.amount"
              @change="adjustAmount(item.id, item.amount)"
          /></label>
          <button class="remove" @click="removeItem(item.id)">移除</button>
        </div>
      </div>
      <h1 id="total" v-if="!cartStore.isLoading">總金額:{{ cartStore.total }}元</h1>
      <h1>收件人資訊</h1>
      <section id="info">
        <label id="same-user"
          ><input type="checkbox" @change="sameWithUser" ref="same" />同訂購人</label
        >
        <label for="">姓名：<input type="text" v-model="receiverName" required /></label>
        <label for="">電話：<input type="tel" v-model="receiverTel" required /></label>
        <label for="">地址：<input type="text" v-model="receiverAddress" required /></label>
        <p id="message" ref="message"></p>
      </section>
      <div id="checkout-box">
        <button id="checkout" @click="handleCheckout">結帳</button>
      </div>
    </div>
  </div>
</template>
