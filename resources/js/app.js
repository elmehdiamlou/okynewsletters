
require('./bootstrap');
require('alpinejs');
window.Vue = require('vue');
import Vue from "vue"

Vue.component('buzzevent-template', require('resources/js/components/Buzzeventtemplate.vue').default);
Vue.component('itskills-template', require('resources/js/components/Itskillstemplate.vue').default);
Vue.component('editor-template', require('resources/js/components/Templateeditor.vue').default);
Vue.component('new-template', require('resources/js/components/Newtemplate.vue').default);


const app = new Vue({
    el: '#app',
    props: {
        show: {
          type: Boolean,
          required: true,
          twoWay: true
        }
      },
});

