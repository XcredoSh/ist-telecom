<template>
  <div class="grid grid-cols-12" style="height: auto !important;">
    <div class=" mt-20 col-span-12 mx-4 md:mx-0 md:col-start-4 md:col-span-8" style="height: auto !important;">
      <div class="bg-red-50 bg-green-50 opacity-0"></div>
      <h1 class="text-3xl  rounded-b-sm w-max mb-6 font-bold mt-6">Xush kelibsiz, {{user.name}} </h1>
      <div class="flex flex-col">
        <section class="text-gray-600 body-font" v-if="user.is_company">
          <div class="container px-5 py-2 mx-auto">
            <div class="flex flex-wrap -m-4">
              <div class="p-4 lg:w-1/2 sm:w-1/2 w-full">
                <h2 class="font-medium title-font tracking-widest text-gray-900 mb-4 text-sm text-center sm:text-left">Kompaniya raxbari</h2>
                <nav class="flex flex-col sm:items-start sm:text-left text-center items-center -mb-1 space-y-2.5">
                  <a>
                    <span class="bg-indigo-100 text-indigo-500 w-4 h-4 mr-2 rounded-full inline-flex items-center justify-center">
                      <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" class="w-3 h-3" viewBox="0 0 24 24">
                        <path d="M20 6L9 17l-5-5"></path>
                      </svg>
                    </span>{{ user.company_head_name }}
                          </a>
                          <a>
                    <span class="bg-indigo-100 text-indigo-500 w-4 h-4 mr-2 rounded-full inline-flex items-center justify-center">
                      <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" class="w-3 h-3" viewBox="0 0 24 24">
                        <path d="M20 6L9 17l-5-5"></path>
                      </svg>
                    </span>{{ user.created_at  }}
                  </a>
                </nav>
              </div>
              <div class="p-4 lg:w-1/2 sm:w-1/2 w-full">
                <h2 class="font-medium title-font tracking-widest text-gray-900 mb-4 text-sm text-center sm:text-left">Kompaniya ma'lumotlari</h2>
                <nav class="flex flex-col sm:items-start sm:text-left text-center items-center -mb-1 space-y-2.5">
                  <a>
                  <span class="bg-indigo-100 text-indigo-500 w-4 h-4 mr-2 rounded-full inline-flex items-center justify-center">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" class="w-3 h-3" viewBox="0 0 24 24">
                      <path d="M20 6L9 17l-5-5"></path>
                    </svg>
                  </span>{{ user.email  }}
                        </a>
                        <a>
                  <span class="bg-indigo-100 text-indigo-500 w-4 h-4 mr-2 rounded-full inline-flex items-center justify-center">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" class="w-3 h-3" viewBox="0 0 24 24">
                      <path d="M20 6L9 17l-5-5"></path>
                    </svg>
                  </span>{{ user.address  }}
                  </a>
                  <a>
                    <span class="bg-indigo-100 text-indigo-500 w-4 h-4 mr-2 rounded-full inline-flex items-center justify-center">
                      <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" class="w-3 h-3" viewBox="0 0 24 24">
                        <path d="M20 6L9 17l-5-5"></path>
                      </svg>
                    </span>{{ user.phone  }}
                          </a>
                          <a>
                    <span class="bg-indigo-100 text-indigo-500 w-4 h-4 mr-2 rounded-full inline-flex items-center justify-center">
                      <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" class="w-3 h-3" viewBox="0 0 24 24">
                        <path d="M20 6L9 17l-5-5"></path>
                      </svg>
                    </span>{{ user.website   }}
                  </a>
                </nav>
              </div>
            </div>
          </div>
        </section>
        <section class="text-gray-600 body-font" v-if="user.is_super">
          <div class="container px-5 py-2 mx-auto">
            <div class="flex flex-wrap -m-4">
              <div class="p-4 lg:w-1/2 sm:w-1/2 w-full">
                <h2 class="font-medium title-font tracking-widest text-gray-900 mb-4 text-sm text-center sm:text-left">Kompaniya nomi</h2>
                <nav class="flex flex-col sm:items-start sm:text-left text-center items-center -mb-1 space-y-2.5">
                  <a>
                    <span class="bg-indigo-100 text-indigo-500 w-4 h-4 mr-2 rounded-full inline-flex items-center justify-center">
                      <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" class="w-3 h-3" viewBox="0 0 24 24">
                        <path d="M20 6L9 17l-5-5"></path>
                      </svg>
                    </span>{{ user.name }}
                  </a>
                  <a>
                    <span class="bg-indigo-100 text-indigo-500 w-4 h-4 mr-2 rounded-full inline-flex items-center justify-center">
                      <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" class="w-3 h-3" viewBox="0 0 24 24">
                        <path d="M20 6L9 17l-5-5"></path>
                      </svg>
                    </span>{{ user.created_at  }}
                  </a>
                </nav>
              </div>
              <div class="p-4 lg:w-1/2 sm:w-1/2 w-full">
                <h2 class="font-medium title-font tracking-widest text-gray-900 mb-4 text-sm text-center sm:text-left">Kompaniya ma'lumotlari</h2>
                <nav class="flex flex-col sm:items-start sm:text-left text-center items-center -mb-1 space-y-2.5">
                  <a>
                  <span class="bg-indigo-100 text-indigo-500 w-4 h-4 mr-2 rounded-full inline-flex items-center justify-center">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" class="w-3 h-3" viewBox="0 0 24 24">
                      <path d="M20 6L9 17l-5-5"></path>
                    </svg>
                  </span>{{ user.email  }}
                  </a>

                </nav>
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

  name: "index",
  computed: {
    loggedIn() {
      return this.$store.state.auth.loggedIn
    },
    user() {
      return this.$store.state.auth.user
    }
  }
}
</script>

<style scoped>

</style>
