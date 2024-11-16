<script setup>
import { useAuthStore } from '@/stores/store'
import { computed, onMounted, ref } from 'vue'
const authStore = useAuthStore()
const account = ref('')
const password = ref('')
const password_confirmation = ref('')
const name = ref('')
const tel = ref('')
const address = ref('')
const message = ref(null)
const isLogin = computed(() => authStore.isLogin)
let handleRegister
onMounted(() => {
  handleRegister = ($event) => {
    $event.preventDefault()
    if (password_confirmation.value !== password.value) {
      message.value.innerText = '密碼不一致'
      message.value.classList.add('is-error')
      return false
    } else {
      message.value.classList.remove('is-error')
      message.value.innerText = ''
      authStore.handleRegister(
        name.value,
        account.value,
        password.value,
        password_confirmation.value,
        tel.value,
        address.value
      )
    }
  }
})
</script>

<template>
  <div id="register-container">
    <form @submit="handleRegister">
      <input type="text" placeholder="請輸入姓名..." v-model="name" required maxlength="255" />
      <input type="email" placeholder="請輸入email..." v-model="account" required maxlength="255" />
      <input
        type="password"
        placeholder="請輸入密碼..."
        v-model="password"
        pattern="[A-Z]{1,}[a-z]{1,}[0-9]{1,}\W{1,}"
        title="須結合大小寫英文字母及數字以及特殊符號至少一個"
        required
        minlength="8"
      />
      <input
        type="password"
        placeholder="請確認密碼..."
        v-model="password_confirmation"
        pattern="[A-Z]{1,}[a-z]{1,}[0-9]{1,}\W{1,}"
        title="須結合大小寫英文字母及數字以及特殊符號至少一個"
        required
        minlength="8"
      />
      <input type="tel" v-model="tel" required placeholder="請輸入電話..." />
      <input type="text" v-model="address" required placeholder="請輸入送貨地址..." />
      <p id="message" ref="message">{{ authStore.message }}</p>
      <div id="buttons">
        <button type="submit">註冊</button>
      </div>
    </form>
  </div>
</template>
