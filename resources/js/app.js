import { createApp } from 'vue';
import BootstrapVue3 from 'bootstrap-vue-3'
// import { BCarousel } from 'bootstrap-vue-3'
// import { BCarouselSlide } from 'bootstrap-vue-3'


import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue-3/dist/bootstrap-vue-3.css'


import App from './components/CardModal.vue'


const app = createApp(App)


app.use(BootstrapVue3)
    // app.component('b-carousel', BCarousel)
    // app.component('b-carousel-slide', BCarouselSlide)



app.mount("#app");