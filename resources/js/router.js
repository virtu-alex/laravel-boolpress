import Vue from 'vue'
import VueRouter from 'vue-router'
import HomePage from './components/pages/HomePage.vue'
import AboutPage from './components/pages/AboutPage.vue'
import ContactsPage from './components/pages/ContactsPage.vue'
import NotFoundPage from './components/pages/NotFoundPage.vue'
import PostDetailPage from './components/pages/PostDetailPage.vue'
Vue.use(VueRouter)

const routes = new VueRouter({
    mode: 'history',
    linkExactActiveClass: 'active',
    routes: [
        { path: '/', component: HomePage, name: 'home' },
        { path: '/about', component: AboutPage, name: 'about' },
        { path: '/contacts', component: ContactsPage, name: 'contacts' },
        { path: '/posts/:slug', component: PostDetailPage, name: 'post-detail' },
        { path: '*', component: NotFoundPage, name: 'not_found' },
    ]
});

export default routes;