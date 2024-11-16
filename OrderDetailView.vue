<script setup>
import { useOrderStore } from '@/stores/store'
import { useRoute } from 'vue-router'
import LoadingAnimation from '@/components/LoadingAnimation.vue'
const orderStore = useOrderStore()
const route = useRoute()
const orderId = route.params.id

const getOrder = (id) => {
  orderStore.getOrder(id)
}
getOrder(orderId)
</script>

<template>
  <div id="order-detail-container">
    <h1 id="list">訂單明細</h1>
    <loading-animation v-if="orderStore.isLoading"></loading-animation>
    <div class="product-box" v-else>
      <div class="product-card" v-for="(o, i) in orderStore.order" :key="i" :id="o.id">
        <img :src="o.image_source" alt="" />
        <p class="product-id">索引編號：{{ i }}</p>
        <p class="product-time">商品名稱：{{ o.name }}</p>
        <p class="product-price">單價：${{ o.price }}元</p>
        <p class="product-price">數量：{{ o.amount }}</p>
        <p class="product-price">折扣：${{ o.discount }}元</p>
        <p class="product-price">總額：${{ o.final_price }}元</p>
      </div>
    </div>
  </div>
</template>
