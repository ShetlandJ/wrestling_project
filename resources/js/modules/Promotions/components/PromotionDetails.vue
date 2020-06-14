<template>
    <b-card no-body class="overflow-hidden details">
        <b-row no-gutters>
            <b-col md="2">
                <b-card-img
                    :src="`/images/${promotion.alias}.png`"
                    alt="Image"
                    class="rounded-0 image-box"
                ></b-card-img>
            </b-col>
            <b-col md="9" class="text-left detail-text">
                <b-card-body :title="promotion.name">
                    <b-card-text>{{promotion.description}}</b-card-text>

                    <b-card-text>
                        <router-link to="/">View wrestlers list</router-link>
                    </b-card-text>
                </b-card-body>
            </b-col>
        </b-row>
    </b-card>
</template>

<script>
export default {
    props: {
        promotion: {
            type: Object,
            required: true
        }
    },
};
</script>

<style scoped>
img {
    max-width: 250px;
}

.detail-text {
    margin: 20px;
}

.image-box {
    background: black;
    margin: 20px;
}
</style>