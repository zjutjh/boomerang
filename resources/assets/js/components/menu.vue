<template>
    <!--<div class="background"  v-for="msg in msgs" :key="msg.id">
       <ul>
           <li>{{msg.type}}</li>
           <li>{{msg.item}}</li>
           <li>{{msg.time}}</li>
           <li>{{msg.place}}</li>
       </ul>
        <img :src="msg.image" alt="实物图片">
    </div>-->
</template>

<script>
    import {api_url} from "../config/env";

    export default {
        name: "menu",
        data:()=>({
            msgs:[],
        }),
        mounted(){
            this.get_messages()
        },
      methods:{
          async get_messages() {
              const header = {
                  'Authorization': "bearer " + this.getToken()
              };
              await this.$http.get(api_url + "/api/new/lists", {headers:header}).then(res => {
                  if (res.code > 0) {
                      this.msgs = res.data;
                      return;
                  }

                  this.message(res.error, 2000);
              })
          }
      }
    }
</script>

<style scoped>
   .background{
    display: flex;
    color: white;
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    border-radius: 2px;
    width: 435px;
    height: 155px;
}
    .background ul{
        color: rgb(22,116,64);
        font-family: "Helvetica Neue", Helvetica, "PingFang SC", "Hiragino Sans GB", "Microsoft YaHei", "微软雅黑", Arial, sans-serif;
        font-size: 16px;
        padding-left: 12px;
    }
    .background img{
        width: 155px;
        height: 100px;
        padding-right: 25px;
        padding-bottom: 30px;
        margin: 0;
    }
</style>