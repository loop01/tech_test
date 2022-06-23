

require('./bootstrap');

window.Vue = require('vue').default;

Vue.component('user-form', require('./components/UserForm.vue').default);

const app = new Vue({
    el: '#app',
});
