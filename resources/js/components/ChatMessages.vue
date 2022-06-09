<template>
    <div>
<!--        <div class="container messages" v-chat-scroll>-->
    <ul class="chat messages" v-chat-scroll="{always: false, smooth: true}">
        <li class="message" v-for="message in messages" :key="message.id">
            <div class="clearfix">
                <div class="header">
<!--            {{message}}-->
                    <strong>
                        {{ message.user.name }}
<!--                        {{ message }}-->
                    </strong>
                    {{ message.created_at | moment}}
<!--                    {{ message.created_at }}-->
                </div>
                <p class="msg">
                    {{ message.message }}
                </p>
            </div>
        </li>
    </ul>
<!--        </div>-->
    </div>
</template>
<script>
import Vue from "vue";
import moment from "moment";

Vue.filter('moment', function(value) {
    if (value) {
        return moment(String(value)).format('MM/DD/YYYY hh:mm')
    }
});
export default {
    props: ["messages"],
    // filters: {
    //     moment: function (date) {
    //         return moment(date).format('MMMM Do YYYY, h:mm:ss a');
    //     }
    // },

};
</script>
