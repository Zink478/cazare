/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import Vue           from 'vue'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import BootstrapVue from "bootstrap-vue";
import VueChatScroll from "vue-chat-scroll/dist/vue-chat-scroll";
import moment from 'moment';



require('./bootstrap');
Vue.use(BootstrapVue);
Vue.use(VueChatScroll);
window.Vue = require('vue').default;
window.axios = require('axios').default;
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('chat-messages', require('./components/ChatMessages.vue').default);
Vue.component('chat-form', require('./components/ChatForm.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    data: {
        messages: [],
        roomNumber: ''
    },
    //Upon initialisation, run fetchMessages().
    mounted() {
        this.fetchMessages();

    },
    methods: {
        fetchMessages() {
            //GET request to the messages route in our Laravel server to fetch all the messages
            //////
            //!!!!!!! get messages cu roomnumber =>> webroute roomnumber ==> ChatsController fetchmessages cu roomNumber
            //////////
            axios.get('/messages').then(response => {
                //Save the response in the messages array to display on the chat view
                this.messages = response.data;
                console.log(this.messages);
                // console.log(response.data);
                this.roomNumber = response.data[0].roomNumber;
                // console.log(this.roomNumber);
            })
                .catch(function(error) {
            });
        },
        //Receives the message that was emitted from the ChatForm Vue component
        addMessage(message) {
            //Pushes it to the messages array
            message.roomNumber = this.roomNumber;

            // this.messages += message;
            // this.messages.push(message);
            window.csrfToken = document.querySelector('meta[name="csrf-token"]').content;
            //POST request to the messages route with the message data in order for our Laravel server to broadcast it.
            axios.post('/messages', {message: message.message, user_id: message.user, roomNumber: message.roomNumber, _token: csrfToken}).then(response => {
                // console.log(response.data);
            })
                .catch(function (error) {
                    // console.log(error);
                });
            this.fetchMessages();
        }
    },
    created()
    {
        Echo.private('chat')
            .listen('MessageSent', (e) => {
                // let obj = [];
                // obj.message = e.message.message;
                // obj.user = e.user;
                // console.log(obj);
                // this.messages = this.messages+obj;
                // // this.messages.push({
                // //     message: e.message.message,
                // //     user: e.message.user_id,
                // // });
                this.fetchMessages();
            });
    }
});
