<script setup>
import { useAuthStore } from '@/stores/store'
import { ref } from 'vue'
import { useRoute } from 'vue-router'
const route = useRoute()
const token = route.params.token
const email = route.query.email
const authStore = useAuthStore()
const account = ref(email)
const password = ref('')
const password_confirmation = ref('')
const message = ref(null)
const handlePasswordReset = ($event) => {
  $event.preventDefault()
  if (password.value !== password_confirmation.value) {
    message.value.innerText = '密碼不一致'
  } else {
    message.value.innerText = ''
    authStore.passwordReset(token, account.value, password.value, password_confirmation.value)
  }
}
</script>

<template>
  <div id="login-container">
    <form @submit="handlePasswordReset($event)">
      <input type="email" placeholder="請輸入email..." v-model="account" required maxlength="255" />
      <input
        type="password"
        placeholder="請輸入新密碼..."
        v-model="password"
        required
        minlength="8"
      />
      <input
        type="password"
        placeholder="請確認新密碼..."
        v-model="password_confirmation"
        required
        minlength="8"
      />
      <p id="message" ref="message">{{ authStore.message }}</p>
      <div id="buttons">
        <button type="submit">送出</button>
      </div>
    </form>
  </div>
</template>
