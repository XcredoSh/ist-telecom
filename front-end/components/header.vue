<template>
  <div>
    <header class="text-gray-600 body-font h-1/4">
      <div class="container-fluid mx-auto flex flex-wrap flex-col md:flex-row items-center shadow-lg h-16 px-5">
        <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0 cursor-pointer sidebar-menu-button " >
          <svg xmlns="http://www.w3.org/2000/svg" width="45.397" height="26.683" viewBox="0 0 45.397 26.683"><g transform="translate(-1009.5 502.5)"><line x2="18.714" transform="translate(1011.5 -500.5)" fill="none" stroke="#858585bf" stroke-linecap="round" stroke-width="4"></line> <line x2="18.714" transform="translate(1034.183 -477.817)" fill="none" stroke="#858585bf" stroke-linecap="round" stroke-width="4"></line> <line x2="41.397" transform="translate(1011.5 -489.158)" fill="none" stroke="#858585bf" stroke-linecap="round" stroke-width="4"></line></g></svg>
        </a>
        <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center">
        </nav>
        <div class=" my-auto flex select-none">

            <div @click="toProfile()" class="pathName cursor-pointer flex justify-center items-center rounded-lg hover:bg-gray-100 p-2">
              <h3 class="mr-3">{{user.name}}</h3>
              <img v-if="user.is_super" width="40px" height="40px" src="admin.png" alt="" class="w-10 h-10 avatar rounded-full object-cover">
              <img v-else width="40px" height="40px" src="company.png" alt="" class="w-10 h-10 avatar rounded-full object-cover">
            </div>


        </div>
      </div>
    </header>
  </div>
</template>

<script>
export default {
  name: "header",
  computed: {
    user() {
      return this.$store.state.auth.user
    }
  },
  methods:{
    toProfile() {
      if (this.$auth.user.is_super) {
        this.$router.push('/admin/profile')
      }else {
        this.$router.push('/company/profile')
      }

    }
  }
}
</script>

<style scoped>

</style>
