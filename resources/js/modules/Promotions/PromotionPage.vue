<template>
    <div class="container">

        <promotion-details :promotion="promotion" />


        {{promotion}}

    </div>
</template>

<script>
import PromotionDetails from './components/PromotionDetails.vue';

export default {
    components: {
        PromotionDetails,
    },
    computed: {
        promotion() {
            return this.$store.getters['promotion/findByAlias'](this.$route.params.alias)
        },
    },
};
</script>

<style>
</style>