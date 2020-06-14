<template>
    <div class="james">{{promotion}}</div>
</template>

<script>
export default {
    computed: {
        promotion() {
            return this.$store.getters['promotion/findByAlias'](this.$route.params.alias)
        },
    },
};
</script>

<style>
</style>