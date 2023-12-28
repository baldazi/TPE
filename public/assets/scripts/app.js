const { createApp, ref } = Vue

const app = createApp({
    setup() {
      const message = ref('Hello vue!')
      return {
        message
      }
    },

    data() {
        return {
          count: 0
        }
      }
  })

  // Delimiters changed to ES6 template string style

app.config.compilerOptions.delimiters = ['%%', '%%']
app.mount('#app')