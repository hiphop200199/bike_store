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