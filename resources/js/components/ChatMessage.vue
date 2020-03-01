<template>
    <div class="chat-message" v-bind:class =" { 'my-message' : logedInUser == messagess.userId, 'your-message' : logedInUser!=messagess.userId}" >
        
        <p style="line-height:1;">{{messagess.message}}</p>
        <span class="info" style="justify-content: space-between; display: flex;"> <small class="time">ti:me</small> <small class="user">{{messagess.user}}</small></span>
       

       
    </div>
</template>

<script>
    export default {
       props: ['message', 'messagess','logedInUser'],
       data: function(){
           return{
               messs:'',
           }
       },
       methods:{
           llMessage(){
               console.log("i can listen too " +this.messsage);
               
           },
           logMes(){
               console.log(this.messages +" ehehe");
               
           }
       },
       created(){
         //  this.logMes();
        // this.llMessage();
        
       },
           

        
    }
</script>

<style lang="css">
.chat-message{
    padding: 5px 10px;
    margin-bottom: 5px;
    border: 1px solid gray;
    display: block;
}
.chat-message p{
    margin-bottom: 1px !important;

}
.my-message{
    background-color: cornflowerblue;
   
    max-width: 70%;
    margin-left: 30%;
    border-radius: 10px 0 0 10px;
}
.your-message{
    background-color: antiquewhite;
    border-radius: 0 10px 10px 0;
    max-width: 70%;
}
.your-message span[class="info"]{
    
    flex-direction: row-reverse;
}
.your-message .time {
    align-self: right;
}
.your-message .user {
    align-self: left;
}
</style>
