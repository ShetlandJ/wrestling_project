<template>
    <div class="container">
        <div class="row mt-4 mb-4" v-for="promotion in promotions" :key="promotion.id">
            <promotion-details :promotion="promotion" />
        </div>
    </div>
</template>

<script>
import PromotionDetails from "./components/PromotionDetails.vue";

export default {
    components: {
        PromotionDetails
    },
    computed: {
        promotions() {
            return this.$store.getters["promotion/promotions"];
        }
    }
};
</script>

<style>
</style>