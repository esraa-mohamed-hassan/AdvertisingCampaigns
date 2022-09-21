import { createApp } from 'vue';

const app = createApp({
    data() {
        return {
            exampleModalShowing: true,
        }
    }
});

// resources/js/app.js
app.component('card-modal', './components/CardModal.vue');

app.config.devtools = true;

app.mount('#app');