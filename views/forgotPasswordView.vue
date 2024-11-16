<script setup>
import { useAuthStore } from '@/stores/store'
import { ref } from 'vue'
const account = ref('')
const authStore = useAuthStore()
const handleForgotPassword = (e) => {
  e.preventDefault()
  authStore.forgotPassword(account.value)
}
</script>

<template>
  <div id="forgot-password-container">
    <form @submit="handleForgotPassword($event)">
      <input
        type="email"
        name=""
        id=""
        placeholder="請輸入註冊email..."
        v-model="account"
        required
      />
      <p id="message" ref="message">{{ authStore.message }}</p>
      <div id="buttons">
        <button type="submit">提交</button>
      </div>
    </form>
  </div>
</template>
