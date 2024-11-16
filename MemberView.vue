<script setup>
import { useAuthStore, useProductStore } from '@/stores/store'
import router from '@/router'
import { computed, onMounted, ref } from 'vue'
import { useRoute } from 'vue-router'
import LoadingAnimation from '@/components/LoadingAnimation.vue'
const authStore = useAuthStore()
const isEditing = ref(false)
let startEdit
let cancelEdit
let editUser
authStore.getUser()
onMounted(() => {
  startEdit = () => {
    isEditing.value = true
    let fields = document.querySelectorAll('[name="changable"]')
    for (let i = 0; i < fields.length; i++) {
      fields[i].removeAttribute('disabled')
    }
  }
  cancelEdit = () => {
    let fields = document.querySelectorAll('[name="changable"]')
    for (let i = 0; i < fields.length; i++) {
      fields[i].setAttribute('disabled', 'true')
    }
    isEditing.value = false
  }
  editUser = () => {
    let fields = document.querySelectorAll('[name="changable"]')
    authStore.editUser(fields[0].value, fields[1].value)
    for (let i = 0; i < fields.length; i++) {
      fields[i].setAttribute('disabled', 'true')
    }
    isEditing.value = false
  }
})
</script>

<template>
  <div id="member-container">
    <h1>會員資料</h1>
    <loading-animation v-if="authStore.isLoading"></loading-animation>
    <section id="info" v-else>
      <button @click="startEdit">編輯</button>
      <label for=""
        >姓名：<input type="text" :value="authStore.user.name" name="" id="" disabled
      /></label>
      <label for=""
        >信箱：<input type="email" :value="authStore.user.email" name="" id="" disabled
      /></label>
      <label for=""
        >電話：<input type="tel" v-model="authStore.user.phone" name="changable" id="" disabled
      /></label>
      <label for=""
        >地址：<input type="text" v-model="authStore.user.address" name="changable" id="" disabled
      /></label>
      <section>
        <button v-if="isEditing" @click="cancelEdit">取消</button>
        <button v-if="isEditing" @click="editUser">確認</button>
      </section>
      <section id="links">
        <router-link to="/order">訂單資料</router-link>
        <!-- <router-link>重設密碼</router-link> -->
      </section>
    </section>
  </div>
</template>
