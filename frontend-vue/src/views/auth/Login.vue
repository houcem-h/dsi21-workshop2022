<template>
    <v-app id="inspire">
        <v-main>
            <v-container fluid fill-height>
                <v-layout align-center justify-center>
                    <v-flex xs12 sm8 md4>
                        <v-card class="elevation-12">
                            <v-toolbar dark color="primary">
                                <v-toolbar-title>Login form</v-toolbar-title>
                            </v-toolbar>
                            <v-card-text>
                                <v-form>
                                    <v-text-field
                                        v-model="credentials.email"
                                        prepend-icon="person"
                                        name="login"
                                        label="Login"
                                        type="text"
                                    ></v-text-field>
                                    <v-text-field
                                        v-model="credentials.password"
                                        id="password"
                                        prepend-icon="lock"
                                        name="password"
                                        label="Password"
                                        type="password"
                                    ></v-text-field>
                                </v-form>
                            </v-card-text>
                            <v-card-actions>
                                <v-spacer></v-spacer>
                                <v-btn color="primary" @click="fireLogin"
                                    >Login</v-btn
                                >
                            </v-card-actions>
                        </v-card>
                    </v-flex>
                </v-layout>
            </v-container>
        </v-main>
    </v-app>
</template>

<script>
export default {
    name: "Login",
    props: {
        source: String,
    },
    data() {
        return {
            credentials: {
                email: "",
                password: "",
            },
        };
    },
    methods: {
        fireLogin() {
            console.log(this.credentials);
        },
    },
};
</script>

<style></style>
