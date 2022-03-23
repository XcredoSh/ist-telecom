<template>
  <div class="grid grid-cols-12" style="height: auto !important;">
    <div class=" mt-20 mb-20 col-span-12 mx-4 md:mx-0 md:col-start-4 md:col-span-8" style="height: auto !important;">
      <div class="bg-red-50 bg-green-50 opacity-0"></div>


      <div class="w-full flex items-center justify-content-between justify-between">
        <h1 class="text-3xl rounded-b-sm w-max mb-6 font-bold mt-6">Xodimlar</h1>
        <nuxt-link type="button" :to="{name: 'company-employee-create'}" class="inline-flex text-white bg-indigo-500 border-0 py-1 px-4 focus:outline-none hover:bg-indigo-600 rounded">Xodim yaratish</nuxt-link>
      </div>

      <div class="flex flex-col">

        <div class="overflow-x-auto">
          <table class="min-w-max w-full table-auto">
            <thead>
            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
              <th class="py-3 px-6 text-left">F.I.O</th>
              <th class="py-3 px-6 text-left">Lavozimi</th>
              <th class="py-3 px-6 text-center">Shaxsni tasdiqlovchi xujjat</th>
              <th class="py-3 px-6 text-center">Telefon</th>
              <th class="py-3 px-6 text-center">Manzil</th>
              <th class="py-3 px-6 text-center">Actions</th>
            </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
            <tr class="border-b border-gray-200 hover:bg-gray-100 cursor-pointer" v-for="(val, index) in employees" :key="`${index}`">
              <td  @click.prevent="goToEmployee(val.id)" class="py-3 px-6 text-left whitespace-nowrap">
                <div class="flex items-center">
                  <div class="mr-2">
                    <i class="fas fa-user-tie"></i>
                  </div>
                  <span class="font-medium">{{ val.last_name }} {{ val.first_name }} {{ val.sur_name }}</span>
                </div>
              </td>
              <td  @click.prevent="goToEmployee(val.id)" class="py-3 px-6 text-left">
                <div class="flex items-center">
                  <span>{{ val.position }}</span>
                </div>
              </td>
              <td  @click.prevent="goToEmployee(val.id)" class="py-3 px-6 text-center">
                <span>{{ val.passport_serial }} {{ val.passport_number }}</span>
              </td>
              <td  @click.prevent="goToEmployee(val.id)" class="py-3 px-6 text-center">
                <span>{{ val.phone }}  </span>
              </td>
              <td  @click.prevent="goToEmployee(val.id)" class="py-3 px-6 text-center">
                <span>{{ val.address }}</span>
              </td>
              <td  class="py-3 px-6 text-center">
                <div class="flex item-center justify-center">

                  <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110 cursor-pointer">
                    <nuxt-link :to="{name: 'company-employee-id', params: {id: val.id}}">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                      </svg>
                    </nuxt-link>
                  </div>

                    <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110 cursor-pointer">
                      <nuxt-link :to="{name: 'company-employee-ids-edit', params: {ids: val.id}}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                        </svg>
                      </nuxt-link>
                    </div>

                  <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110 cursor-pointer" @click.prevent="deletedEmploye(val.id)">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                  </div>
                </div>
              </td>
            </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "index",
  data() {
    return {
      employees: []
    }
  },
  mounted() {
    this.getEmployees();
  },
  methods: {
    async getEmployees() {
      try {
        await this.$axios.$get('/employees').then((response) => {
          this.employees = response.employees;

        })
      } catch (err) {
        console.log(err)
      }
    },
    goToEmployee(v) {
      this.$router.push({name: 'company-employee-id', params: {id: v} })
    },
    deletedEmploye(c) {
      if(confirm("Rostdan o'chirishni istaysizmi?")){
        try {
          this.$axios.$delete('/employees/'+c).then((response) => {
            if (response) {
              this.$toast.show({
                type: 'success',
                title: 'Deleted',
                message: response.success,
              })
            }
          }).then(() => {
            setTimeout(() => {
              this.$router.go(this.$router.currentRoute);
            }, 5000)
          })
        } catch (err) {
          console.log(err)
        }
      }
    }
  }
}
</script>

<style scoped>

</style>
