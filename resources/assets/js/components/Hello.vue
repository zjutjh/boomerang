<template>
    <div>
        <h1>Hello, Larvuent!</h1>
        <p class="hello">{{ msg }}</p>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                msg: 'This is a Laravel with Vue and Element Demo.'
            }
        }
    }
</script>composer config -g repo.packagist composer https://packagist.phpcomposer.com


<style>
    .hello {
        font-size: 2em;
        color: green;
    }
</style>