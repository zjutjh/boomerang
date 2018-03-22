<template>
    <div class="title-wrap">
        <div class="title">{{ title }}</div>
        <button v-if="ifBack" class="title-back" @click="back">返回</button>

    </div>
</template>

<script>

    export default {
        name: "title",
        props: ['title', 'ifBack'],
        methods: {
            back() {
                this.$router.go(-1);
            }
        }
    }
</script>

<style scoped>
    .title-wrap {
        width: 27.7422rem;
        height: 6.61545rem;
        margin: 0 auto;
    }

    .title-wrap .title {
        height: 6.61545rem;
        line-height: 6.61545rem;
        font-size: 2.13444rem;
        font-weight: bold;
        color: #32b16c;
        float: left;
    }
    button {
        border: none;
    }

    .title-back {
        float: right;
        border-radius: 15px;
        font-size: 1.42296rem;
        padding: .554844rem 1.36577rem;
        color: #fff;
        background: #32b16c;
        margin-top: 1.53649rem;


    }

</style>