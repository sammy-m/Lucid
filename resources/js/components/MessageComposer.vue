<template>
    <div class="message-composer">
        <input type="text" name="message" placeholder="type message here..." v-model="newText" v-on:keyup.enter="sendMessage" >
        <button class="btn btn-primary" @click="sendMessage">Send</button>
    </div>
</template>

<script>
    export default {
       data(){
           return{
               newText: '',
           }
       },
       methods: {
           sendMessage(){
               console.log(this.newText);
               this.$emit('messagesent',{
                   message: this.newText,
                   user: 'sam'
               });
               this.newText = "";
               
           },
           
       }
    }
</script>

<style lang="css">
 

</style>
