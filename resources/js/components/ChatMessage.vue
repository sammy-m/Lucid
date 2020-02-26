<template>
    <div class="chat-message">
        <span class="message-user">{{message.user}}</span>
        <p>{{message.message}}</p>
        <small>ti:me</small>
    </div>
</template>

<script>
    export default {
       props: ['message'],
           

        
    }
</script>

<style lang="css">
.chat-message{
    padding: 5px 10px;
    margin-bottom: 5px;
    border: 1px solid gray;
}
.chat-message p{
    margin-bottom: 1px !important;

}
</style>
