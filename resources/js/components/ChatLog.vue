<template>
    <div class="chat-log" >
       <div class="chat-view" style="">
           <chat-message v-for="(message,index) in messages" :messagess="message" v-bind:key="index" :logedInUser="logedInUser"></chat-message> <br>
           </div> 
         <message-composer v-on:messagesent="addmessage" v-bind:messages="messages" :orderId="orderId" :userId="userId" :userName='userName'></message-composer>
       
    </div>
</template>

<script>
    export default {
       props: ['messagessss', 'orderId', 'newText'],
       data: function(){
           return{
               messages: [],
               userId: '',
               userName: '',
               logedInUser: '',
              
           }
       },
       created(){
           let msg = this.messages;
           console.log(msg);
           
       },
       methods:{
           llMessage(){
               console.log("hihihi");
               
           },
           mymes(){
               let mess = {
            message: 'I am fine thanks.',
           user: 'Nicole',
           user_id: '2', };
            console.log(mess +'ehehe');
       
              
           },
           fetchMessages(id){
              
               axios.get('/fetch/messages/'+id).then(response => {
                   console.log(response.data[1]);

                 var data =   JSON.stringify(response.data);
                   console.log(data);

                   this.messages = response.data[0];
                   //this.orderId = response.data.orderId;
                   this.userId = response.data[1];
                   this.logedInUser=response.data[1];
                   this.userName = response.data[2];
                   
                   
                  // JSON.stringify(this.response);
                   }
              
                   
              
               ).then().catch(err => console.log(err) );
               //console.log('I have been called to order '+this.orderId+' >user>'+this.userId);

           },
           addmessage(newMessage){
               console.log('I have been called '+newMessage+' '+this.orderId+" or "+this.userId);
               
               
             /*  axios.post('/store/message', 
                  newMessage.message
                  
                ).then(response => {console.log(response);
               });
               
               this.messages.push(newMessage); */
              let newText = {
                message: newMessage.message,
                orderId: this.orderId,
                userId: this.userId,
                user: this.userName
                };
               axios.post('/store/message', newText)
                .then((response) => {
                    if(response.status === 200){
                        this.messages.push(newText);
                    }
                    else{
                        alert('failed to send');
                    }
                console.log(response);
                }, (error) => {
                console.log(error);
                });
           }
       },
       created(){
           console.log(this.orderId +" scream");
          this.mymes();
          this.fetchMessages(this.orderId);
           
       },
    }
</script>

<style lang="css">
 .chat-log{
     min-height: 100%;
 }
 .chat-view{
     max-height: 500px;
     overflow-y: scroll;
    
     
 }
 .chat-view ::-webkit-scrollbar{
     width: 3px !important;
 }
 .chat-log ::-webkit-scrollbar-track{
     background: transparent;
 }
.chat-view ::-webkit-scrollbar-thumb{
     background: grey;
     max-height: 30px;
 }
</style>
