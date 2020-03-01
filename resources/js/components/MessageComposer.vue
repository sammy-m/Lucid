<template>
    <div class="message-composer">
        
        <input type="text" name="message" placeholder="type message here..." v-model="newText" v-on:keyup.enter="sendMessage" >
        <button class="btn btn-primary" @click="sendMessage">Send</button>
        
       
        
        
    </div>
</template>

<script>
    export default {
        props:['messages','userId', 'orderId', 'userName'],
       data(){
           return{
               newText: '',
               messa: '',
               title: 'wtf',
               
           }
       },
       methods: {
           sendMessage(){
               console.log(this.newText);
               this.$emit('messagesent',{
                   message: this.newText,
                   userId: this.userId,
                   orderId: this.orderId,
               });
               this.newText = "";
               
           },
           messaAdd(){
               this.messa++;
           },
           checkValues(){
               
               console.log(this.userId +" user id is here");
               
           }
           
       },
       mounted(){
           
           console.log(this.userId+"<user< >order> "+this.orderId+" what nows");
           //this.checkValues();
           
       },
    }
</script>

<style lang="css">
 

</style>
