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
                        :to="{ name: 'promotion.page', params: { promotionName: 'wwe'} }"
                    >WWE</router-link>
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
        ...mapGetters(["isLogged"])
    },
    methods: {
        logout() {
            this.$store.dispatch("logout");
        }
    }
};
</script>

<style>
a {
    color: white;
}

.white {
    color: white;
}
</style>