<template>
  <div>
    <Header/>
    <Sidebar v-if="user.is_super === 1"/>
    <CompanySidebar v-if="user.is_company  === 2"/>
    <Nuxt/>
  </div>
</template>

<script>
import Header from "~/components/header";
import Sidebar from "~/components/sidebar";
import CompanySidebar from "~/components/companySidebar";
export default {
  components: {CompanySidebar, Sidebar, Header},
  computed: {
    loggedIn() {
      return this.$store.state.auth.loggedIn
    },
    user() {
      return this.$auth.user
    }
  }
}
</script>

<style>

</style>
