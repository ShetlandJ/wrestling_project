<template>
    <div class="container">
        <p>James</p>
    </div>
</template>

<script>
import PromotionDetails from "./components/PromotionDetails.vue";

export default {
    components: {
        PromotionDetails
    },
    props: {
        promotion: {
            type: String,
            default: '',
        }
    },
    created() {
        this.$store.dispatch("promotion/loadWithFilters", {
            url: `/promotions/alias/${this.$route.params.alias}`,
            alias: this.$route.params.alias
        });
    }
};
</script>

<style>
</style>