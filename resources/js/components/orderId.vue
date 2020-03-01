<template>
    <div class="chat-id" >
        <!--chat-message v-for="(message,index) in messages" :message="message" v-bind:key="index"></chat-message-->
       <h5>Chat {{id}}</h5>
    </div>
</template>

<script>
    export default {
       props: ['id'],
       methods:{
           llMessage(){
               console.log("hihihi");
               
           }
       },
       created(){
           console.log(this.id +'iss');
           
           
       },
    }
</script>

<style lang="css">
 .chat-log{
     min-height: 100%;
 }
</style>
