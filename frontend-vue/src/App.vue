<template>
    <v-app>
        <!-- <v-navigation-drawer v-model="sidebar" app>
            <v-list>
                <v-list-item
                    v-for="item in menuItems"
                    :key="item.title"
                    :to="item.path"
                >
                    <v-list-item-action>
                        <v-icon>{{ item.icon }}</v-icon>
                    </v-list-item-action>
                    <v-list-item-content>{{ item.title }}</v-list-item-content>
                </v-list-item>
            </v-list>
        </v-navigation-drawer> -->

        <v-app-bar>
            <span class="hidden-sm-and-up">
                <v-app-bar-nav-icon @click="sidebar = !sidebar">
                </v-app-bar-nav-icon>
            </span>
            <v-app-bar-title>
                <router-link to="/" tag="span" style="cursor: pointer">
                    {{ appTitle }}
                </router-link>
            </v-app-bar-title>
            <v-spacer></v-spacer>
            <div v-if="!loggedIn">
                <v-btn
                    text
                    v-for="item in guestMenuItems"
                    :key="item.title"
                    :to="item.path"
                >
                    <v-icon left dark>{{ item.icon }}</v-icon>
                    {{ item.title }}
                </v-btn>
            </div>
            <div v-else>
                <v-btn
                    text
                    v-for="item in userMenuItems"
                    :key="item.title"
                    :to="item.path"
                >
                    <v-icon left dark>{{ item.icon }}</v-icon>
                    {{ item.title }}
                </v-btn>
                <v-btn text key="Logout" @click="logout">
                    <v-icon left dark>logout</v-icon>
                    Logout
                </v-btn>
            </div>
        </v-app-bar>

        <v-main>
            <router-view />
        </v-main>
    </v-app>
</template>

<script>
import "@/store/index";
export default {
    name: "App",

    data() {
        return {
            appTitle: "Awesome App",
            sidebar: false,
            guestMenuItems: [
                { title: "Home", path: "/home", icon: "home" },
                { title: "Register", path: "/signup", icon: "face" },
                { title: "Login", path: "/login", icon: "lock_open" },
            ],
            userMenuItems: [
                { title: "Home", path: "/posts", icon: "home" },
                { title: "Profile", path: "/profile", icon: "account_circle" },
            ],
        };
    },
    computed: {
        loggedIn() {
            return this.$store.getters.loggedIn;
        },
    },
    methods: {
        logout() {
            this.$store.dispatch("logout").then(() => {
                this.$router.push("/login");
            });
        },
    },
};
</script>
