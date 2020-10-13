/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
//require('chart.js');

window.Vue = require('vue');

import Vue from 'vue';
import VueChatScroll from 'vue-chat-scroll';
Vue.use(VueChatScroll);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('chat-log', require('./components/ChatLog.vue').default);
Vue.component('chat-message', require('./components/ChatMessage.vue').default);
//Vue.component('message-composer', require('./components/MessageComposer.vue').default);
Vue.component('order-id', require('./components/orderId.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    data: {
       messages:[],
       tt: "wtf",
       orderId:"",
       userId:"",
    },
    methods: {
        addMessage(message){
            console.log("message added");
            this.messages.push(message);
            
        },
        
       // fetchChat(id){

      //  },
    },
    created() {
       //var session = eval('(<?php echo json_encode($_SESSION)?>)');
       // console.log(session);
      /* var id = '';
       this.fetchChat(id);*/
       
        console.log(this.orderId +'is');

        Echo.private('chat').listen('MessageSent', (e) =>{
            /*  this.messages.push({
                    message: e.message.message,
                    orderId: e.message.orderId,
                    userId: e.message.userId,
                    user: e.user.name
              }); */
              console.log(e +" at root");
              
          });
           
        
    }
});

// resources/assets/js/app.js

import $ from 'jquery';
window.$ = window.jQuery = $;

import 'jquery-ui/ui/widgets/datepicker.js';//add as many widget as you may need
//import 'jquery-ui/ui/widgets/timepicker.js';

// resources/assets/js/app.js
$('.datepicker').datepicker();
//$('input.timepicker').timepicker();
// e.g <input type="text" class="datepicker" />
