<template>
    <div>
        <b-navbar type="dark" variant="dark">
            <b-navbar-nav>
                <b-nav-item href="#">
                    <router-link to="/">Home</router-link>
                </b-nav-item>

                <b-nav-item disabled>
                    <span class="white">|</span>
                </b-nav-item>

                <b-nav-item href="#">
                    <router-link
                        :to="{ name: 'promotions' }"
                    >Promotions</router-link>
                </b-nav-item>
            </b-navbar-nav>

            <b-navbar-nav class="ml-auto">
                <b-nav-item v-if="isLogged" right>
                    <router-link to="/">Logout</router-link>
                </b-nav-item>
                <b-nav-item v-else right>
                    <router-link to="/">Login</router-link>
                </b-nav-item>
            </b-navbar-nav>
        </b-navbar>
    </div>
</template>

<script>
import { mapGetters } from "vuex";

export default {
    computed: {
        ...mapGetters("auth", ["isLogged"]),
        ...mapGetters("promotion", ["promotions"]),
        promotions() {
            return this.$store.getters["promotion/promotions"].data;
        }
    },
    created() {
        this.$store.dispatch("promotion/getPromotions");
    },
    methods: {
        logout() {
            this.$store.dispatch("auth/logout");
        }
    }
};
</script>

<style scoped>
a {
    color: white;
}

.white {
    color: white;
}
</style>