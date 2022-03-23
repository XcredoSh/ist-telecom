<template>
  <div class="grid grid-cols-12" style="height: auto !important;">
    <div class=" mt-20 mb-20 col-span-12 mx-4 md:mx-0 md:col-start-4 md:col-span-8" style="height: auto !important;">
      <div class="bg-red-50 bg-green-50 opacity-0"></div>
      <div class="w-full flex items-center justify-content-between justify-between">
        <h1 class="text-3xl rounded-b-sm w-max mb-6 font-bold mt-6">Tashkilot yaratish</h1>
      </div>

      <div class="flex flex-col">
        <div class="p-5">
          <div class="mt-2">
            <form @submit.prevent="registerCompany">
              <div class="flex flex-col md:flex-row border-b border-gray-200 pb-4 mb-4">
                <div class="w-64 font-bold h-6 mx-2 mt-3 text-gray-800">Tashkilot</div>
                <div class="flex-1 flex flex-col md:flex-row">
                  <div class="w-full flex-1 mx-2">
                    <div class="my-2 p-1 bg-white flex border border-gray-200 rounded">
                      <input placeholder="Tashkilot nomi" v-model="company.company_name" required class="p-1 px-2 appearance-none outline-none w-full text-gray-800 ">
                    </div>
                  </div>
                  <div class="w-full flex-1 mx-2">
                    <div class="my-2 p-1 bg-white flex border border-gray-200 rounded">
                      <input placeholder="Tashkilot direktorining ism sharfi" v-model="company.company_head_name" required class="p-1 px-2 appearance-none outline-none w-full text-gray-800 ">
                    </div>
                  </div>
                </div>
              </div>
              <div class="flex flex-col md:flex-row pb-4 mb-4">
                <div class="w-64 font-bold h-6 mx-2 mt-3 text-gray-800">Qo'shimcha ma'lumotlar
                  <div class="text-xs font-normal leading-none text-gray-500">Email, telefon, manzil...</div>
                </div>
                <div class="flex-1">
                  <div class="flex flex-col md:flex-row">
                    <div class="w-full flex-1 mx-2">
                      <div class="my-2 p-1 bg-white flex border border-gray-200 rounded">
                        <input type="email" v-model="company.email" placeholder="Pochta manzil" required class="p-1 px-2 appearance-none outline-none w-full text-gray-800 "> </div>
                    </div>
                    <div class="w-full flex-1 mx-2">
                      <div class="my-2 p-1 bg-white flex border border-gray-200 rounded">
                        <input type="tel" v-model="company.phone" placeholder="Telefon raqam" required class="p-1 px-2 appearance-none outline-none w-full text-gray-800 "> </div>
                    </div>
                  </div>
                  <div class="m-2">
                    <div class="w-full flex-1">
                      <div class="my-2 p-1 bg-white flex border border-gray-200 rounded">
                        <input type="text" v-model="company.website" placeholder="Website manzil" required class="p-1 px-2 appearance-none outline-none w-full text-gray-800 ">
                      </div>
                      <div class="my-2 p-1 bg-white flex border border-gray-200 rounded">
                        <input type="text" v-model="company.address" placeholder="Tashkilot joylashgan manzil" required class="p-1 px-2 appearance-none outline-none w-full text-gray-800 ">
                      </div>
                    </div>
                  </div>
                  <div class="flex flex-col md:flex-row">
                    <div class="w-full flex-1 mx-2">
                      <div class="my-2 p-1 bg-white flex border border-gray-200 rounded">
                        <input type="password" v-model="company.password" placeholder="Maxfiy so'z" required class="p-1 px-2 appearance-none outline-none w-full text-gray-800 "> </div>
                    </div>
                    <div class="w-full flex-1 mx-2">
                      <div class="my-2 p-1 bg-white flex border border-gray-200 rounded">
                        <input type="password" v-model="company.c_password" placeholder="Maxfiy so'zni takrorlang" required class="p-1 px-2 appearance-none outline-none w-full text-gray-800 "> </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="flex flex-col md:flex-row">
                <div class="w-64 mx-2 font-bold h-6 mt-3 text-gray-800"></div>
                <div class="flex-1 flex flex-col md:flex-row">
                  <button type="submit" class="text-sm  mx-2 w-32  focus:outline-none flex justify-center px-4 py-2 rounded font-bold cursor-pointer
                    hover:bg-teal-700 hover:text-teal-100
                    bg-teal-100
                    text-teal-700
                    border duration-200 ease-in-out
                    border-teal-600 transition">Saqlash
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "create",
  data() {
    return {
      company: {
        company_name: '',
        company_head_name: '',
        address: '',
        email: '',
        website: '',
        phone: '',
        password: '',
        c_password: ''
      }
    }
  },
  methods: {
    async  registerCompany() {
      try {
        await this.$axios.post('companies', {
          company_name: this.company.company_name,
          company_head_name: this.company.company_head_name,
          address: this.company.address,
          email: this.company.email,
          website: this.company.website,
          phone: this.company.phone,
          password: this.company.password,
          c_password: this.company.c_password
        }).then((res) => {
          console.log(res);
          this.$toast.show({
            type: 'success',
            title: 'Success',
            message: res.data.success.message,
          })
          this.company = {}
        })
      } catch (err) {
        console.log(err);
      }
    }
  }
}
</script>

<style scoped>

</style>
