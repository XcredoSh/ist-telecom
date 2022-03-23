<template>
  <div class="grid grid-cols-12" style="height: auto !important;">
    <div class=" mt-20 mb-20 col-span-12 mx-4 md:mx-0 md:col-start-4 md:col-span-8" style="height: auto !important;">
      <div class="bg-red-50 bg-green-50 opacity-0"></div>
      <div class="w-full flex items-center justify-content-between justify-between">
        <h1 class="text-3xl rounded-b-sm w-max mb-6 font-bold mt-6">{{employees.first_name}} {{employees.last_name}} {{employees.sur_name}}</h1>
      </div>

      <div class="flex flex-col">
        <section class="text-gray-600 body-font overflow-hidden">
          <div class="container px-5 py-24 mx-auto">
            <div class="-my-8 divide-y-2 divide-gray-100">
              <div class="py-8 flex flex-wrap md:flex-nowrap">
                <div class="md:w-64 md:mb-0 mb-6 flex-shrink-0 flex flex-col">
                  <span class="font-semibold title-font text-gray-700">Lavozimi </span>
                  <span class="mt-1 text-gray-500 text-sm">12 Jun 2019</span>
                </div>
                <div class="md:flex-grow">
                  <h2 class="text-2xl font-medium text-gray-900 title-font mb-2">{{employees.position}}</h2>
                </div>
              </div>
              <div class="py-8 flex flex-wrap md:flex-nowrap">
                <div class="md:w-64 md:mb-0 mb-6 flex-shrink-0 flex flex-col">
                  <span class="font-semibold title-font text-gray-700">Shaxsni tasdiqlovchi xujjat</span>
                  <span class="mt-1 text-gray-500 text-sm">12 Jun 2019</span>
                </div>
                <div class="md:flex-grow">
                  <h2 class="text-2xl font-medium text-gray-900 title-font mb-2">{{employees.passport_serial}} {{employees.passport_number}}</h2>
                </div>
              </div>
              <div class="py-8 flex flex-wrap md:flex-nowrap">
                <div class="md:w-64 md:mb-0 mb-6 flex-shrink-0 flex flex-col">
                  <span class="font-semibold title-font text-gray-700">Telefon raqam</span>
                  <span class="text-sm text-gray-500">12 Jun 2019</span>
                </div>
                <div class="md:flex-grow">
                  <h2 class="text-2xl font-medium text-gray-900 title-font mb-2">{{employees.phone}}</h2>
                </div>
              </div>
              <div class="py-8 flex flex-wrap md:flex-nowrap">
                <div class="md:w-64 md:mb-0 mb-6 flex-shrink-0 flex flex-col">
                  <span class="font-semibold title-font text-gray-700">Manzil</span>
                  <span class="text-sm text-gray-500">12 Jun 2019</span>
                </div>
                <div class="md:flex-grow">
                  <h2 class="text-2xl font-medium text-gray-900 title-font mb-2">{{employees.address}}</h2>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "_id",
  data() {
    return {
      employee_id : this.$route.params.id,
      employees: []
    }
  },
  mounted() {
    this.getEmployee();
  },
  methods: {
    async getEmployee() {
      try {
        await this.$axios.$get('/employees/'+ this.employee_id).then((response) => {
          this.employees = response.employee;
        })
      } catch (err) {
        console.log(err)
      }
    }
  }
}
</script>

<style scoped>

</style>
