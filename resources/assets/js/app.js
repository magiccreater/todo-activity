
require('./bootstrap');

window.Vue = require('vue');

Vue.component('tasks-list', require('./components/TasksList.vue'));

const app = new Vue({
    el: '#app'
});
