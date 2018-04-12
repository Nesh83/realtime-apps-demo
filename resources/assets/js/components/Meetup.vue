<template>
    <div id="meetup" class="row">
        <div class="slider-wrapper col-md-9">
            <div class="single-photo-holder">
                <!--<img src="../assets/sone/3.png" class="img-responsive" width="100%">-->
                <img :src="slides[photoIndex]" class="img-responsive" width="100%">
                <i v-if="left" class="fa fa-angle-left" aria-hidden="true" @click="slideLeft()" @keyup.left="keyLeft()"
                   tabindex="0"></i>
                <i v-if="right" class="fa fa-angle-right" aria-hidden="true" @click="slideRight()"
                   @keyup.right="keyRight()" tabindex="0"></i>
            </div>
        </div>
        <div class="comment-wrapper col-md-3">
            <div class="comments" id="comments-holder">
                <div class="comment-holder" v-for="(item,index) in messages" :key="index">
                    <div class="name">{{ item.sender.name }}:</div>
                    <div class="single-comment">{{ item.text }}</div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import json from '../../json/meetup.json'

    export default {
        name: 'meetup',
        props: [],
        data() {
            return {
                right: true,
                left: true,
                slides: json.slides,
                messages: [],
                photoIndex: 0
            }
        },
        computed: {},
        mounted() {
            if (this.photoIndex === 0) {
                this.left = false
                this.right = true
            } else if (this.photoIndex === (this.slides.length - 1)) {
                this.right = false
                this.left = true
            } else {
                this.right = true
                this.left = true
            }

            this.$http.get('/messages/public').then((response) => {
                this.messages = response.data
            }, (response) => {
                console.log(response)
            })



        },
        created() {
            let channel = Echo.channel('public-chat')
            channel.listen('NewPublicMessageEvent', (event) => {
                this.messages.unshift(event.message)
                this.scrollTop()
            })
        },
        methods: {
            slideLeft() {
                this.photoIndex -= 1
                if (this.photoIndex === 0) {
                    this.left = false
                }
                if (this.right === false) {
                    this.right = true
                }
            },
            slideRight() {
                this.photoIndex += 1
                if (this.photoIndex === (this.slides.length - 1)) {
                    this.right = false
                }
                if (this.left === false) {
                    this.left = true
                }
            },
            keyLeft() {
                console.log('uslo')
                this.photoIndex -= 1
                if (this.photoIndex === 0) {
                    this.left = false
                }
                if (this.right === false) {
                    this.right = true
                }
            },
            keyRight() {
                console.log('uslo')
                this.photoIndex += 1
                if (this.photoIndex === (this.slides.length - 1)) {
                    this.right = false
                }
                if (this.left === false) {
                    this.left = true
                }
            },
            scrollTop(){
                var objDiv = document.getElementById("comments-holder");
                objDiv.scrollTop = 0;
            }
        }
    }
</script>

<style lang="scss" scoped>
    #meetup {
        margin: 0;
        height: calc(100vh - 88px);
        @media screen and (max-width: 992px) {
            height: auto;
        }
    }

    .comment-wrapper {
        background: linear-gradient(180deg, #ffffff 0%, #e1e1e1 100%);
        height: 100%;
    }

    .slider-wrapper {
        height: 100%;
        background: linear-gradient(180deg, #2d2d2d 0%, #5c9b30 100%);
    }

    .single-photo-holder {
        position: relative;
        height: 100%;
        img {
            width: 100%;
            display: inline-block;
            height: 100%;
            padding-top: 10vh;
            padding-bottom: 10vh;
        }
        .fa-angle-left {
            position: absolute;
            left: 7px;
            top: 46%;
            font-size: 64px;
            color: rgba(196, 196, 196, .8);
            cursor: pointer;
        }
        .fa-angle-right {
            position: absolute;
            right: 7px;
            top: 46%;
            font-size: 64px;
            color: rgba(196, 196, 196, .8);
            cursor: pointer;
        }
        @media screen and (max-width: 992px) {
            margin: 0;
        }
    }

    .comments {
        height: 100%;
        overflow-y: auto;
        @media screen and (max-width: 992px) {
            height: auto;
        }
    }

    .comment-holder {
        margin: 15px 0;
    }

    .single-comment {
        color: #000000;
        font-size: 18px;
        text-align: left;
    }

    .name {
        text-align: left;
        color: #5c9b30;
        font-size: 20px;
    }
</style>
