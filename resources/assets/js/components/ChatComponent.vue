<template>
    <div class="container">

        <div id="chat" class="row">
            <div class="slider-wrapper col-md-3">
                <div class="single-photo-holder" v-for="user in users">
                    {{user.name}}
                </div>
            </div>
            <div class="comment-wrapper col-md-9">
                <div class="comments" id="comments-holder">
                    <div class="comment-holder" v-for="message in messages">
                        <div class="name">{{message.sender.name}}:</div>
                        <div class="single-comment">{{message.text}}</div>
                    </div>
                </div>
                <div class="write-comment">
                    <input type="text" placeholder="Comment here" class="comment" v-on:keyup.enter="sendMessage" v-model="newMessage">
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
                this.messages.unshift(event.message)
                this.scrollTop()
            })
        },
        methods: {
            sendMessage() {
                this.$http.post('/messages/public', {'text': this.newMessage}).then((response) => {
                    this.messages.unshift(response.data)
                    this.newMessage = '';
                    this.scrollTop()
                }, (response) => {
                    console.log(response)
                })
            },
            scrollTop(){
                var objDiv = document.getElementById("comments-holder");
                objDiv.scrollTop = 0;
            }
        }
    }
</script>
<style lang="scss" scoped>
    #chat {
        margin: 0;
        height: calc(100vh - 88px);
        @media screen and (max-width: 992px) {
            height: auto;
        }
    }

    .comment-wrapper {
        background: linear-gradient(180deg, #2d2d2d 0%, #191919 100%);
        height: 100%;
    }

    .slider-wrapper {
        height: 100%;
        background: linear-gradient(180deg, #2d2d2d 0%, #5c9b30 100%);
        padding-top: 20px;
    }

    .single-photo-holder {
        position: relative;
        font-size: 25px;
        color: #fff;
        padding: 5px;
        @media screen and (max-width: 992px) {
            margin: 0;
        }
    }

    .comments {
        height: calc(100% - 70px);
        overflow-y: auto;
        @media screen and (max-width: 992px) {
            height: auto;
        }
    }

    .comment-holder {
        margin: 15px 0;
    }

    .single-comment {
        color: #fff;
        font-size: 18px;
        text-align: left;
    }

    .name {
        text-align: left;
        color: #5c9b30;
        font-size: 20px;
    }

    .comment {
        width: 100%;
        padding: 5px;
        border: none;
        border-bottom: 1px solid #fff;
        background-color: transparent;
        font-size: 20px;
        color: #fff;
        &::placeholder {
            color: #fff;
        }
        &:focus {
            border: 1px solid #5c9b30;
            outline: none;
        }
    }

    .write-comment {
        margin: 15px 0;
    }
</style>
