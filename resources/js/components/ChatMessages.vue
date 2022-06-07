<template>
    <div>
<!--        <div class="container messages" v-chat-scroll>-->
    <ul class="chat messages" v-chat-scroll="{always: false, smooth: true}">
        <li class="message" v-for="message in messages" :key="message.id">
            <div class="clearfix">
                <div class="header">
                    <strong>
                        {{ message.user.name }}
                    </strong>
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
export default {
    props: ["messages"],
};
</script>
