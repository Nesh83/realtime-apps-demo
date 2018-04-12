<template>
    <div class="container">
        <div class="row">

            <div class="conversation-wrap col-lg-3">
                <div><h4>Active users:</h4></div>

                <div class="media conversation" v-for="user in users">
                    <div class="media-body">
                        <h5 class="media-heading">{{user.name}}</h5>
                    </div>
                </div>
            </div>


            <div class="message-wrap col-lg-8">

                <div class="msg-wrap" v-for="message in messages">
                    <div class="media msg ">
                        <div class="media-body">
                            <h5 class="media-heading">{{message.sender.name}}</h5>
                            <p class="col-lg-10">{{message.text}}</p>
                            <small class="pull-right time"><i class="fa fa-clock-o"></i> {{message.created_at}}</small>
                        </div>
                    </div>
                </div>

                <div class="send-wrap ">
                    <textarea class="form-control send-message" rows="3" placeholder="Write a reply..."
                              v-model="newMessage"></textarea>
                </div>
                <div class="btn-panel">
                    <button type="button" v-on:click="sendMessage"
                            class=" col-lg-4 text-right btn   send-message-btn pull-right" role="button"><i
                            class="fa fa-plus"></i> Send Message
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                messages: [],
                users: [],
                newMessage: ''
            }
        },
        mounted() {

            this.$http.get('/messages/public').then((response) => {
                this.messages = response.data
            }, (response) => {
                console.log(response)
            })


        },
        created() {
            let chanel = Echo.join('chat')

            chanel.here((users) => {
                users.forEach(el => {
                    this.users.push(el)
                })
            }).joining((user) => {
                if (this.users.indexOf(user) == -1) {
                    this.users.push(user)
                }
            }).leaving((user) => {
                this.users.splice(this.users.indexOf(user), 1)
            }).listen('NewMessageEvent', (event) => {
                this.messages.push(event.message)
            })
        },
        methods: {
            sendMessage() {
                this.$http.post('/messages/public', {'text': this.newMessage}).then((response) => {
                    this.messages.push(response.data)
                    this.newMessage = '';
                }, (response) => {
                    console.log(response)
                })
            }
        }
    }
</script>
