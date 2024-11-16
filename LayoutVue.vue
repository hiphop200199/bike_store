<script setup>
import { useAuthStore } from '@/stores/store'
import { computed, onMounted, ref } from 'vue'
import { RouterView, RouterLink } from 'vue-router'
const authStore = useAuthStore()
const asideMenuPic = ref(null)
const asideMenu = ref(null)
const toggleAsideMenu = () => {
  asideMenuPic.value.classList.toggle('rotated')
  asideMenu.value.classList.toggle('active')
}
const handleLogout = () => {
  authStore.handleLogout()
}
const handleAsideLogout = () => {
  toggleAsideMenu()
  authStore.handleLogout()
}
console.log(authStore.isLogin)
</script>

<template>
  <div id="layout">
    <header>
      <router-link to="/"><img src="../assets/book.png" alt="logo" /></router-link>
      <nav>
        <section>
          <router-link to="/list" title="商品查詢"
            ><img src="https://cdn-icons-png.flaticon.com/128/1621/1621643.png" alt=""
          /></router-link>

          <router-link v-if="authStore.isLogin !== null" to="/member" title="會員資料"
            ><img src="../assets/user.png" alt="" id="user"
          /></router-link>
          <router-link v-if="authStore.isLogin !== null" to="/order" title="訂單資料"
            ><img src="../assets/view-list.png" alt="" id="order"
          /></router-link>
          <router-link v-if="authStore.isLogin !== null" to="/cart" title="購物車">
            <img src="../assets/shopping-cart.png" alt="" id="cart" />
            <!-- <span id="cart-amount" :class="">(1)</span> -->
          </router-link>
          <button v-if="authStore.isLogin !== null" @click="handleLogout">
            <img src="../assets/log-out.png" alt="" id="logout" title="登出" />
          </button>
        </section>
        <router-link to="/login" title="登入" v-if="authStore.isLogin === null"
          ><img src="../assets/log-in.png" alt="" id="login"
        /></router-link>
        <button id="aside-menu-btn" @click="toggleAsideMenu">
          <img
            ref="asideMenuPic"
            src="../assets/menu.png"
            alt="aside-menu-pic"
            id="aside-menu-pic"
          />
        </button>
      </nav>
    </header>
    <router-view />
    <footer>
      <a href="https://hiphop200199.github.io/eric_bookstore/"
        ><img src="../assets/book.png" alt="logo"
      /></a>
      <p id="copyright">Copyright © Reading 2024 | All Rights Reserved.</p>
      <a href="https://www.instagram.com/" target="_blank"
        ><img src="../assets/instagram.png" alt="" id="instagram"
      /></a>
    </footer>
    <aside ref="asideMenu">
      <section>
        <button @click="toggleAsideMenu"><router-link to="/list">商品查詢</router-link></button>
        <button @click="toggleAsideMenu" v-if="authStore.isLogin !== null">
          <router-link to="/member">會員資料</router-link>
        </button>
        <button @click="toggleAsideMenu" v-if="authStore.isLogin !== null">
          <router-link to="/order">訂單查詢</router-link>
        </button>
        <button @click="toggleAsideMenu" v-if="authStore.isLogin !== null">
          <router-link to="/cart">購物車</router-link>
        </button>
        <button id="aside-logout" v-if="authStore.isLogin !== null" @click="handleAsideLogout">
          <a>登出</a>
        </button>
        <button v-if="authStore.isLogin === null" @click="toggleAsideMenu">
          <router-link to="/login">登入</router-link>
        </button>
      </section>
    </aside>
    <a href="#" id="to-top"><img src="../assets/up-arrow.png" alt="" /></a>
  </div>
</template>
