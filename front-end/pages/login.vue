<template>
  <div>
    <section class="text-gray-600 body-font">
      <div class="container px-5 py-4 mx-auto flex items-center md:flex-row flex-col">
        <div class="flex flex-col md:pr-10 md:mb-0 mb-6 pr-0 w-full md:w-auto md:text-left text-center">
          <h2 class="text-xs text-indigo-500 tracking-widest font-medium title-font mb-1">BARCHA XIZMATLAR</h2>
          <h1 class="md:text-3xl text-2xl font-medium title-font text-gray-900">IST TELEKOM KOMPANIYASI XIZMATLARI</h1>
        </div>
        <div class="flex md:ml-auto md:mr-0 mx-auto items-center flex-shrink-0 space-x-4">
          <button @click="isCheck('admin')" class="bg-gray-100 inline-flex py-3 px-5 rounded-lg items-center hover:bg-gray-200 focus:outline-none">
            <i class="fad fa-user-headset" style="font-size: 24px;"></i>
            <span class="ml-4 flex items-start flex-col leading-none">
            <span class="text-xs text-gray-600 mb-1">GET IT ON</span>
            <span class="title-font font-medium">For Admin</span>
          </span>
          </button>
          <button @click="isCheck('company')" class="bg-gray-100 inline-flex py-3 px-5 rounded-lg items-center hover:bg-gray-200 focus:outline-none">
            <i class="fad fa-building" style="font-size: 24px;"></i>
            <span class="ml-4 flex items-start flex-col leading-none">
          <span class="text-xs text-gray-600 mb-1">GET IT ON</span>
          <span class="title-font font-medium">For Company</span>
        </span>
          </button>
        </div>
      </div>
    </section>
    <section class="flex justify-center items-center h-screen bg-gray-100" v-if="is_admin">
      <form  @submit.prevent="adminLogin()" class="w-full flex justify-center items-center">
        <div class="max-w-md w-full bg-white rounded p-6 space-y-4">
          <div class="mb-4">
            <p class="text-gray-600">Kirish</p>
            <h2 class="text-xl font-bold">Admin uchun</h2>
          </div>
          <div>
            <input class="w-full p-4 text-sm bg-gray-50 focus:outline-none border border-gray-200 rounded text-gray-600" type="text" placeholder="Elektron pochta" v-model="login.email" required>
          </div>
          <div>
            <input class="w-full p-4 text-sm bg-gray-50 focus:outline-none border border-gray-200 rounded text-gray-600" type="text" placeholder="Maxfiy so'z" v-model="login.password" required>
          </div>
          <div>
            <button class="w-full py-4 bg-blue-600 hover:bg-blue-700 rounded text-sm font-bold text-gray-50 transition duration-200" type="submit" >Kirish</button>
          </div>
          <div>
            <i>{{error}}</i>
          </div>
          <div class="flex items-center justify-between">
            <div class="flex flex-row items-center">
              <input type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded">
              <label  class="ml-2 text-sm font-normal text-gray-600">Meni esla</label>
            </div>
            <div>
              <a class="text-sm text-blue-600 hover:underline" href="#">Parolni unutdingizmi?</a>
            </div>
          </div>
        </div>
      </form>
    </section>
    <section class="flex justify-center items-center h-screen bg-gray-100" v-if="is_company">
      <form  @submit.prevent="companyLogin()" class="w-full flex justify-center items-center">
        <div class="max-w-md w-full bg-white rounded p-6 space-y-4">
          <div class="mb-4">
            <p class="text-gray-600">Kirish</p>

            <h2 class="text-xl font-bold">Tashkilot uchun</h2>
          </div>
          <div>
            <input class="w-full p-4 text-sm bg-gray-50 focus:outline-none border border-gray-200 rounded text-gray-600" type="text" placeholder="Elektron pochta" v-model="login.email" required>
          </div>
          <div>
            <input class="w-full p-4 text-sm bg-gray-50 focus:outline-none border border-gray-200 rounded text-gray-600" type="text" placeholder="Maxfiy so'z" v-model="login.password" required>
          </div>
          <div>
            <button class="w-full py-4 bg-blue-600 hover:bg-blue-700 rounded text-sm font-bold text-gray-50 transition duration-200" type="submit">Kirish</button>
          </div>
          <div>
            <i>{{error}}</i>
          </div>
          <div class="flex items-center justify-between">
            <div class="flex flex-row items-center">
              <input type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded">
              <label  class="ml-2 text-sm font-normal text-gray-600">Meni esla</label>
            </div>
            <div>
              <a class="text-sm text-blue-600 hover:underline" href="#">Parolni unutdingizmi?</a>
            </div>
          </div>
        </div>
      </form>
    </section>
  </div>
</template>

<script>
export default {
  auth: 'guest',
  layout: 'login',
  name: 'login',
  data() {
    return {
      login: {
        email: '',
        password: ''
      },
      error: '',
      is_admin: true,
      is_company: false,
    }
  },
  computed: {

  },
  methods: {
    isCheck(v) {
      if (v === 'admin') {
        this.is_company = false
        this.is_admin = true
      }else if (v === 'company') {
        this.is_admin = false
        this.is_company = true
      }
    },
    async adminLogin() {
      try {
        let response = await this.$auth.loginWith('admin', { data: this.login })
        // this.$router.push('/');
        if (!response.data.success) {
          this.$toast.show({
            type: 'danger',
            title: 'Error',
            message: response.data.error,
          })
        }
        if (response.data.errors) {
          this.$toast.show({
            type: 'danger',
            title: 'Error',
            message: response.data.message,
          })
        }
      } catch (err) {
        console.log(err)

      }
    },
    async companyLogin() {
      try {
        let response = await this.$auth.loginWith('company', { data: this.login })
        console.log(response);
      } catch (err) {
        this.error = err.data.message;
        console.log(err)
      }
    }
  }
}
</script>
