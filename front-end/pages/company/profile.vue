<template>
  <div class="grid grid-cols-12" style="height: auto !important;">
    <div class=" mt-20 col-span-12 mx-4 md:mx-0 md:col-start-4 md:col-span-8" style="height: auto !important;">
      <div class="bg-red-50 bg-green-50 opacity-0"></div>
      <h1 class="text-3xl  rounded-b-sm w-max mb-6 font-bold mt-6">Salom alaykum </h1>
      <p class="font-bold">{{ this.$auth.user.name }}</p>
      <br>
      <div class="mt-8  shadow-lg rounded-lg p-6  rounded border border-gray-200">
        <p class="font-bold">
          Men ochiq kodli loyihalar ustida ishlaydigan va yaxshi g'oyalar ishlab chiqaruvchi to'liq stack ishlab chiquvchisiman, buni ko'rishingiz mumkin
        </p>
        <br>
        <br>
        <br>
        <p class="">
          If you like what I do you can support me by :
        </p>
        <span class="pathName" data-path="https://www.linkedin.com/in/yazan-alnughnugh-130a05a3/">
            <i class="cursor-pointer transition rounded text-lg text-gray-400 hover:text-blue-500 fab fa-linkedin"></i>
          </span>
        <span class="pathName" data-path="https://github.com/yazan-alnugnugh">
            <i class="cursor-pointer transition rounded text-lg text-gray-400 hover:text-gray-900 fab fa-github-square"></i>
          </span>
        <span class="pathName" data-path="https://twitter.com/YazanN100">
            <i class="cursor-pointer transition rounded text-lg text-gray-400 hover:text-blue-400 fab fa-twitter-square"></i>
          </span>
        <span class="pathName" data-path="https://www.facebook.com/yazan.alnughnugh/">
            <i class="cursor-pointer transition rounded text-lg text-gray-400 hover:text-main-color fab fa-facebook-square"></i>
          </span>
      </div>
      <br>
      <br>
      <br>
      <button class="inline-flex text-white bg-indigo-500 border-0 py-1 px-4 focus:outline-none hover:bg-indigo-600 rounded" @click.prevent="logout">Tizimdan chiqish</button>
    </div>
  </div>
</template>

<script>
export default {
  name: "profile",
  methods:{
    async logout() {
      await this.$auth.logout();
    }
  }
}
</script>

<style scoped>

</style>
