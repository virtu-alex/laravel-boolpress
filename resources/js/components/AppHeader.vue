<template>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">Navbar</a>
            <button
                class="navbar-toggler"
                type="button"
                data-toggle="collapse"
                data-target="#navbarNav"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li v-for="link in links" :key="link.name" class="nav-item">
                        <router-link class="nav-link" :to="{ name: link.name }"
                            >{{ link.title }}
                        </router-link>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
</template>
<script>
export default {
    name: "AppHeader",
    data: () => ({
        links: [
            { name: "home", title: "Home" },
            { name: "about", title: "About" },
            { name: "contacts", title: "Contacts" },
        ],
    }),
    props: {
        title: String,
    },
};
</script>
<style lang=""></style>
