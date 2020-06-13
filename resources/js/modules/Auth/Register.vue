<template>
    <div>
        <div class="container">
            <div class="card card-default">
                <div class="card-header">Register</div>

                <form autocomplete="off" @submit.prevent="register" method="post">
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input
                            type="email"
                            id="email"
                            class="form-control"
                            placeholder="user@example.com"
                            v-model="email"
                        />
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input
                            type="password"
                            id="password"
                            class="form-control"
                            v-model="password"
                        />
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Confirm password</label>
                        <input
                            type="password"
                            id="password_confirmation"
                            class="form-control"
                            v-model="password_confirmation"
                        />
                    </div>

                    <button type="submit" class="btn btn-default">Register</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            email: "",
            password: "",
            password_confirmation: ""
        };
    },

    methods: {
        register() {
            const payload = {
                email: this.email,
                password: this.password,
                password_confirmation: this.password_confirmation
            };

            this.$store
                .dispatch("register", payload)
                .then(() => {
                    this.$router.push({ name: "About" });
                })
                .catch(err => {
                    console.log(err);
                });
        }
    }
};
</script>
