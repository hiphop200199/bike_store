<script setup>
import { ref } from 'vue'
import { useAuthStore, useOrderStore } from '@/stores/store'
import LoadingAnimation from '@/components/LoadingAnimation.vue'

const authStore = useAuthStore()
const orderStore = useOrderStore()
const isLogin = authStore.isLogin
orderStore.getOrders()
</script>

<template>
  <div id="order-container">
    <h1 id="list">訂單清單</h1>
    <loading-animation v-if="orderStore.isLoading"></loading-animation>
    <div class="product-box" v-else>
      <div
        class="product-card"
        v-for="(order, index) in orderStore.orders"
        :key="index"
        :id="order.id"
      >
        <p class="product-id">
          訂單編號：{{ order.id
          }}<router-link :to="'order-detail/' + order.id">(詳細內容)</router-link>
        </p>
        <p class="product-time">訂購時間：{{ order.created_at }}</p>
        <p class="product-time">付款狀態：{{ order.payment_status }}</p>
        <p class="product-price">訂單金額：${{ order.total_price }}元</p>
        <p class="product-price">處理狀態：{{ order.pickup_status }}</p>
      </div>
    </div>
  </div>
</template>
