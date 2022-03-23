<template>
  <div class="grid grid-cols-12" style="height: auto !important;">

    <div class=" mt-20 mb-20 col-span-12 mx-4 md:mx-0 md:col-start-4 md:col-span-8 " style="height: auto !important;">

      <div class="bg-red-50 bg-green-50 opacity-0"></div>
      <div class="w-full flex items-center justify-content-between justify-between">
        <h1 class="text-3xl rounded-b-sm w-max mb-6 font-bold mt-6">Xodim ma'lumotlarini taxrirlash</h1>
      </div>

      <div class="flex flex-col">
        <div class="p-5">
          <div class="mt-2">
            <form @submit.prevent="updateEmployee">
              <div class="flex flex-col md:flex-row border-b border-gray-200 pb-4 mb-4">
                <div class="w-64 font-bold h-6 mx-2 mt-3 text-gray-800">Xodim </div>
                <div class="flex-1 flex flex-col md:flex-row">
                  <div class="w-full flex-1 mx-2">
                    <div class="my-2 p-1 bg-white flex border border-gray-200 rounded">
                      <input type="text" placeholder="Familya" v-model="employeeData.last_name" required class="p-1 px-2 appearance-none outline-none w-full text-gray-800 ">
                    </div>
                  </div>
                  <div class="w-full flex-1 mx-2">
                    <div class="my-2 p-1 bg-white flex border border-gray-200 rounded">
                      <input type="text" placeholder="Ism" v-model="employeeData.first_name" required class="p-1 px-2 appearance-none outline-none w-full text-gray-800 ">
                    </div>
                  </div>
                  <div class="w-full flex-1 mx-2">
                    <div class="my-2 p-1 bg-white flex border border-gray-200 rounded">
                      <input type="text" placeholder="Otasining ismi" v-model="employeeData.sur_name" required class="p-1 px-2 appearance-none outline-none w-full text-gray-800 ">
                    </div>
                  </div>
                </div>
              </div>
              <div class="flex flex-col md:flex-row pb-4 mb-4">
                <div class="w-64 font-bold h-6 mx-2 mt-3 text-gray-800">Xodimning qo'shimcha ma'lumotlari
                  <div class="text-xs font-normal leading-none text-gray-500">Lavozim, telefon, manzil...</div>
                </div>
                <div class="flex-1">

                  <div class="flex flex-col md:flex-row">
                    <div class="w-full flex-1 mx-2">
                      <div class="my-2 p-1 bg-white flex border border-gray-200 rounded">
                        <input type="text" v-model="employeeData.passport_serial" placeholder="Passport seryasi" required class="p-1 px-2 appearance-none outline-none w-full text-gray-800 "> </div>
                    </div>
                    <div class="w-full flex-1 mx-2">
                      <div class="my-2 p-1 bg-white flex border border-gray-200 rounded">
                        <input type="text" v-model="employeeData.passport_number" placeholder="Passport no'meri" required class="p-1 px-2 appearance-none outline-none w-full text-gray-800 "> </div>
                    </div>
                  </div>
                  <div class="flex flex-col md:flex-row">
                    <div class="w-full flex-1 mx-2">
                      <div class="my-2 p-1 bg-white flex border border-gray-200 rounded">
                        <input type="text" v-model="employeeData.position" placeholder="Lavozimi" required class="p-1 px-2 appearance-none outline-none w-full text-gray-800 "> </div>
                    </div>
                    <div class="w-full flex-1 mx-2">
                      <div class="my-2 p-1 bg-white flex border border-gray-200 rounded">
                        <input type="tel" v-model="employeeData.phone" placeholder="Telefon raqami" required class="p-1 px-2 appearance-none outline-none w-full text-gray-800 "> </div>
                    </div>
                  </div>
                  <div class="flex flex-col md:flex-row">
                    <div class="w-full flex-1 mx-2">
                      <div class="my-2 p-1 bg-white flex border border-gray-200 rounded">
                        <input type="text" v-model="employeeData.address" placeholder="Manzil" required class="p-1 px-2 appearance-none outline-none w-full text-gray-800 "> </div>
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
                    border-teal-600 transition">Taxrirlash
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
  name: "edit",
  data() {
    return {
      employeeData: {
        last_name: '',
        first_name: '',
        sur_name: '',
        position: '',
        passport_serial: '',
        passport_number: '',
        phone: '',
        address: '',
        company_id: this.$auth.user.id,
      },
      employee_id : this.$route.params.ids
    }
  },
  mounted() {
    this.getEmployeeById();
  },
  methods: {
    async getEmployeeById() {
      try {
        await this.$axios.get(`/employees/${this.employee_id}/edit`).then((res) => {
          const d = res.data.employee;
          this.employeeData = {
            last_name: d.last_name,
            first_name: d.first_name,
            sur_name: d.sur_name,
            position: d.position,
            passport_serial: d.passport_serial,
            passport_number: d.passport_number,
            phone: d.phone,
            address: d.address,
            company_id: this.$auth.user.id,
          }
        })
      } catch (err) {
        console.log(err);
      }
    },
    async updateEmployee() {
      if(confirm("Rostdan taxrirlashni istaysizmi?")){
        try {
          await this.$axios.put('/employees/'+ this.employee_id, this.employeeData).then((res) => {
            this.$toast.show({
              type: 'success',
              title: 'Updated',
              message: res.data.success,
            })
          })
        } catch (err) {
          console.log(err);
        }
      }

    }
  }
}
</script>

<style scoped>

</style>
