<template>
    <v-app>
        <v-navigation-drawer v-model="sidebar" app>
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
        </v-navigation-drawer>

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
            <v-btn
                text
                v-for="item in menuItems"
                :key="item.title"
                :to="item.path"
            >
                <v-icon left dark>{{ item.icon }}</v-icon>
                {{ item.title }}
            </v-btn>
        </v-app-bar>

        <v-main>
            <router-view />
        </v-main>
    </v-app>
</template>

<script>
export default {
    name: "App",

    data() {
        return {
            appTitle: "Awesome App",
            sidebar: false,
            menuItems: [
                { title: "Home", path: "/home", icon: "home" },
                { title: "Sign Up", path: "/signup", icon: "face" },
                { title: "Sign In", path: "/signin", icon: "lock_open" },
            ],
        };
    },
};
</script>
