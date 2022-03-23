<template>
  <div>
    <aside class="sidebar-menu nice-scroll d-flex flex-column shadow-lg" style="transform: translateX(0px); opacity: 1;">

      <div class="pathName menu-item mr-2 flex justify-content-start ml-3 py-3
     cursor-pointer hover:bg-blue-100 hover:border-l-4 hover:border-blue-400
      transition-all duration-300 ease rounded-r-lg">
        <nuxt-link to="/">
        <span class="ml-2">
        <i class="fas fa-home text-gray-600"></i>
      </span>
          <span class="ml-2 font-bold select-none">Dashboard</span>
        </nuxt-link>
      </div>
      <div class="pathName menu-item mr-2 flex justify-content-start ml-3 py-3
                  cursor-pointer hover:bg-blue-100 hover:border-l-4 hover:border-blue-400
                  transition-all duration-300 ease rounded-r-lg">
        <nuxt-link :to="{name: 'company-employee'}">
          <span class="ml-2">
            <i class="fas fa-table text-gray-600"></i>
          </span>
          <span class="ml-2 font-bold select-none">Xodimlar</span>
        </nuxt-link>
      </div>
      <div class="pathName menu-item mr-2 flex justify-content-start ml-3 py-3
     cursor-pointer hover:bg-blue-100 hover:border-l-4 hover:border-blue-400
      transition-all duration-300 ease rounded-r-lg">
      <span class="ml-2">
        <i class="fas fa-cogs text-gray-600"></i>
      </span>
        <span class="ml-2 font-bold select-none">Tuzatishlar</span>
      </div>
    </aside>
  </div>
</template>

<script>
export default {
  name: "companySidebar"
}
</script>

<style scoped>
.sidebar-menu {
  background-color: #fff;
  border-top-right-radius: 10px;
  height: 100%;
  height: calc(100vh - 77px);
  margin-top: 15px;
  overflow: hidden;
  overflow-y: auto;
  padding-top: 30px;
  position: fixed;
  top: 77px;
  transition: all .5s ease;
  transition-delay: 0s;
  transition-duration: .5s;
  transition-timing-function: ease;
  width: 270px;
  z-index: 1000;
}
.fa-cogs:before {
  content: "\f085";
}
.fa-table:before {
  content: "\f0ce";
}
.fa-home:before {
  content: "\f015";
}


.hover\:border-blue-400:hover {
  --tw-border-opacity: 1;
  border-color: rgba(96,165,250,var(--tw-border-opacity));
}

.hover\:border-l-4:hover {
  border-left-width: 4px;
}
</style>
