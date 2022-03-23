export default {
  // Global page headers: https://go.nuxtjs.dev/config-head
  head: {
    title: 'front-end',
    meta: [
      { charset: 'utf-8' },
      { name: 'viewport', content: 'width=device-width, initial-scale=1' },
      { hid: 'description', name: 'description', content: '' },
      { name: 'format-detection', content: 'telephone=no' }
    ],
    link: [
      { rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' },
      { rel: 'stylesheet', href: 'https://pro.fontawesome.com/releases/v5.10.0/css/all.css', integrity: 'sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p', crossorigin:"anonymous" },
    ],
    script: [
      {src: '' },
    ],
  },

  loading: {
    name: 'chasing-dots',
    color: '#ff5638',
    background: 'white',
    height: '2px'
  },

  // Global CSS: https://go.nuxtjs.dev/config-css
  css: [
  ],

  ssr: false,

  // Plugins to run before rendering page: https://go.nuxtjs.dev/config-plugins
  plugins: [
  ],

  // Auto import components: https://go.nuxtjs.dev/config-components
  components: true,

  // Modules for dev and build (recommended): https://go.nuxtjs.dev/config-modules
  buildModules: [
    // https://go.nuxtjs.dev/tailwindcss
    '@nuxtjs/tailwindcss',
  ],

  // Modules: https://go.nuxtjs.dev/config-modules
  modules: [
    // https://go.nuxtjs.dev/axios
    '@nuxtjs/axios',
    // https://go.nuxtjs.dev/pwa
    '@nuxtjs/pwa',

    '@nuxtjs/auth-next',

    ['nuxt-tailvue', {toast: true}],
  ],

  auth: {
    // Options
    strategies: {
      admin: {
        scheme: 'local',
        token: {
          property: 'access_token',
          global: true,
          required: true,
          type: 'Bearer'
        },
        user: {
          property: ''
        },
        endpoints: {
          login: { url: '/auth/login/admin', method: 'post' },
          logout: { url: '/logout/admin', method: 'post' },
          user: { url: '/me/admin', method: 'post' }
        },

      },
      company: {
        scheme: 'local',
        token: {
          property: 'access_token',
          global: true,
          // required: true,
          // type: 'Bearer'
        },
        user: {
          property: ''
        },
        endpoints: {
          login: { url: '/auth/login/company', method: 'post' },
          logout: { url: '/auth/company', method: 'post' },
          user: { url: '/me/company', method: 'post' }
        }
      }
    },
    redirect: {
      login: '/login',
      logout: '/',
      callback: false,
      home: '/'
    }

  },

  // Axios module configuration: https://go.nuxtjs.dev/config-axios
  axios: {
    // Workaround to avoid enforcing hard-coded localhost:3000: https://github.com/nuxt-community/axios-module/issues/308
    baseURL: process.env.API_URL,
  },

  // PWA module configuration: https://go.nuxtjs.dev/pwa
  pwa: {
    manifest: {
      lang: 'en'
    }
  },

  // Build Configuration: https://go.nuxtjs.dev/config-build
  build: {
  },

  router: {
    middleware: ['auth']
  }
}
