<template>
    <div class="tabber-wrap">
        <ul class="tabber-menu">

            <li class="menu-item">

                <router-link :to="{ name: 'tofind'}" tag="div" replace>
                    <img class="menu-item-img" :src="lostHover ? lost[0] : lost[1]" alt="">
                    <label for="" class="menu-title">寻物</label>
                </router-link>
            </li>


            <li class="menu-item">
                <router-link :to="{ name: 'found'}" tag="div" replace>
                    <img class="menu-item-img" :src="foundHover ? found[0] : found[1]" alt="">
                    <label for="" class="menu-title">招领</label>
                </router-link>
            </li>

            <router-link :to="{ name: 'release'}" tag="div" replace>
                <li class="menu-add">
                    <img class="menu-add-icon" src="../images/add.png" alt="">
                </li>
            </router-link>

            <li class="menu-item">
                <router-link :to="{ name: 'mine'}" tag="div" replace>
                    <img class="menu-item-img" :src="mineHover ? mine[0] : mine[1]" alt="">
                    <label for="" class="menu-title">我的</label>
                </router-link>
            </li>


            <li class="menu-item">
                <router-link  :to="{}" tag="div" replace>
                    <img class="menu-item-img" :src="searchHover ? search[0] : search[1]" alt="">
                    <label for="" class="menu-title">搜索</label>
                </router-link>
            </li>


        </ul>

    </div>
</template>

<script>
    import lost_img from '../images/lost.png'
    import lost_hover from '../images/lost-hover.png'
    import found_img from '../images/found.png'
    import found_hover from '../images/found-hover.png'
    import search_img from '../images/search.png'
    import search_hover from '../images/search-hover.png'
    import mine_img from '../images/mine.png'
    import mine_hover from '../images/mine-hover.png'
    export default {
        name: "tabber",
        data() {
            return {
                lost: [
                    lost_img,
                    lost_hover
                ],
                found: [
                    found_img,
                    found_hover
                ],
                search: [
                    search_img,
                    search_hover
                ],
                mine: [
                    mine_img,
                    mine_hover
                ],
                lostHover: true,
                foundHover: false,
                searchHover: false,
                mineHover: false,
            }
        },
        watch: {
            '$route': function () {
                this.lostHover = false
                this.foundHover = false
                this.searchHover = false
                this.mineHover = false
                if (this.$route.fullPath === '/') {
                    this.lostHover = true
                }
                if (this.$route.fullPath.indexOf('found') > -1) {
                    this.foundHover = true
                }
                if (this.$route.fullPath.indexOf('search') > -1) {
                    this.searchHover = true
                }
                if (this.$route.fullPath.indexOf('mine') > -1) {
                    this.mineHover = true
                }


            }
        },
        methods: {

        }
    }
</script>

<style scoped>
    .tabber-wrap {
        height: 4.694rem;
        width: 100%;
        position: fixed;
        bottom: 0;
        background: #32b16c;
    }

    .tabber-wrap .tabber-menu {
        height: 100%;
        width: 100%;
        position: absolute;
    }

    .tabber-wrap .tabber-menu .menu-item {
        list-style: none;
        float: left;
        width: 2.475rem;
        height: 100%;
        margin: 0 2rem;
        margin-bottom: .42rem;

    }

    .tabber-menu .menu-add {
        list-style: none;
        position: absolute;
        width: 5rem;
        height: 5rem;
        border-radius: 50%;
        border: .469rem solid #32b16c;
        left: 50%;
        top: -1.536rem;
        transform: translateX(-50%);
        background: #fff;

    }

    .menu-add .menu-add-img {

    }

    .menu-item:nth-child(n + 3) {
        float: right !important;
    }

    .tabber-menu .menu-item-img {
        display: block;
        height: 2rem;
        width: 2rem;
        margin: 0 auto;
        margin-top: .59rem;
    }

    .menu-title {
        font-size: 1.19rem;
        color: #fff;

    }

    img {
        width: 100%;
        height: 100%;
    }
</style>