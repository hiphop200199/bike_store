<script setup>
import LoadingAnimation from '@/components/LoadingAnimation.vue'
import { useCartStore } from '@/stores/store'
import { useRoute } from 'vue-router'
const route = useRoute()
const sessionId = route.query.session_id
const cartStore = useCartStore()
cartStore.checkoutSuccess(sessionId)
</script>
<template>
  <div id="homepage-container">
    <loading-animation v-if="cartStore.isLoading"></loading-animation>
    <h1 class="checkout-result-title" v-if="!cartStore.isLoading">結帳成功!</h1>
    <section id="to-search" v-if="!cartStore.isLoading">
      <h3>搜尋</h3>
      <p>尋找最喜歡的那一本書</p>
      <div id="pic-and-link">
        <img src="../assets/blonde-1866951_1280.jpg" alt="" />
        <router-link to="/list">連結</router-link>
      </div>
    </section>
  </div>
</template>
