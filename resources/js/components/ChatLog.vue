<template>
    <div class="chat-log">
        <chat-message v-for="(message,index) in messages" :message="message" v-bind:key="index"></chat-message>
       
    </div>
</template>

<script>
    export default {
       props: ['messages'],
    }
</script>

<style lang="css">
 .chat-log{
     min-height: 100%;
 }
</style>
