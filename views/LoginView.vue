<script setup>
import { useAuthStore } from '@/stores/store'
import { computed } from 'vue'
const authStore = useAuthStore()
let account = ''
let password = ''
const handleLogin = ($event, email, password) => {
  $event.preventDefault()
  authStore.handleLogIn(email, password)
}
</script>

<template>
  <div id="login-container">
    <form @submit="handleLogin($event, account, password)">
      <input type="email" placeholder="請輸入email..." v-model="account" required />
      <input type="password" placeholder="請輸入密碼..." v-model="password" required />
      <p id="message" ref="message">{{ authStore.message }}</p>
      <div id="buttons">
        <button type="submit">登入</button>
        <router-link to="/register"><button>註冊</button></router-link>
      </div>
      <router-link to="/forgot-password">忘記密碼?</router-link>
    </form>
  </div>
</template>
