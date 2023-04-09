import { createApp } from 'vue';
import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

const app = createApp({});

import BookingPanel from './components/BookingPanel.vue';
app.component('booking-panel', BookingPanel);


app.mount('#app');
