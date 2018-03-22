<template>
    <div class="wrapper">
        <v-head></v-head>
        <div class="content">
            <div class="actions">
                <table border="1">
                    <tr>
                        <th>操作</th>
                        <th>时间</th>
                    </tr>
                    <tr>
                        <td class="action">shanchuadssad</td>
                        <td class="action-time">asdda</td>
                    </tr>
                </table>
            </div>
            <div class="losts">
                <table border="1">
                    <tr>
                        <th>物件</th>
                        <th>时间</th>
                        <th>地点</th>
                    </tr>
                    <tr>
                        <td class="item">shanchuadssad</td>
                        <td class="time">asdda</td>
                        <td class="place">asddaasd</td>
                    </tr>
                </table>
            </div>
            <div class="founds">
                <tr>
                    <th>物件</th>
                    <th>时间</th>
                    <th>地点</th>
                </tr>
                <tr>
                    <td class="item">shanchuadssad</td>
                    <td class="time">asdda</td>
                    <td class="place">asddaasd</td>
                </tr>
            </div>
        </div>
    </div>
</template>

<script>
    import loading from '../../components/Loading';
    import state from '../../components/state.mixin';
    import {api_url} from "../../config/env";
    import vHead from '../../components/Header.vue';

    export default {
        components:{
            vHead
        }
    }
</script>

<style lang="css" scoped>
.actions{
    width:300px;
    float: left;
}
</style>