<template>
    <div class="pull-left">
        <a :href=homeUrl>
        <img src="../../images/logoQ.png" class="img-responsive"/>
        </a>
        <div>
            <a class="btn header-btn" :href=homeUrl>Slides</a>
            <a class="btn header-btn" :href=chatUrl>Chat</a>
        </div>
    </div>
</template>

<script>
export default {
  name: 'myHeader',
  data () {
    return {
        homeUrl: process.env.MIX_APP_URL,
        chatUrl: process.env.MIX_APP_URL+'/chat'
    }
  },
  computed: {},
  mounted () {
  }
}
</script>

<style lang="scss" >
    .my-header {
        background-color: #191919;
        padding: 20px 25px;
        color: #fff;
        font-size: 30px;
        text-align: center;
        height: 88px;
        div {
            display: inline-block;
            margin: 5px 15px;
            img {
                display: inline-block;
            }
        }
        .header-btn {
            color: #fff;
            background-color: #5c9b30;
            text-transform: uppercase;
            font-size: 18px;
            padding: 10px 25px;
            margin-bottom: 5px;
            &:focus {
                border: none;
                outline: none;
            }
        }
        .red {
            background-color: #a94442;
        }
        @media screen and (max-width: 992px){
            font-size: 20px;
            height: auto;
            div {
                float: none !important;
                display: block;
            }
        }
    }

</style>
