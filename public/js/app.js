import createPage from './create-page.js';
import portfolio from './portfolio.js';

const routes = [
    { path: '/', component: createPage('home') },
    { path: '/about', component: createPage('about') },
    { path: '/contact', component: createPage('contact') },
    { path: '/portfolio', component: portfolio },
    { path: '*', component: createPage('404') }
];

const router = new VueRouter({
    routes,
    base: '/',
    mode: 'history',
    linkExactActiveClass: "active"
});
const app    = new Vue({router}).$mount('#root')