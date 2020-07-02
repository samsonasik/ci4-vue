import createPage from './create-page.js';
import portfolio from './portfolio.js';
import store      from './store.js';

const routes = [
    { path: '/', component: createPage('home'), meta: { title: 'Home'}  },
    { path: '/about', component: createPage('about'), meta: { title: 'About'}  },
    { path: '/contact', component: createPage('contact'), meta: { title: 'Contact'}  },
    { path: '/portfolio', component: portfolio, meta: { title: 'Portfolio'}  },
    { path: '*', component: createPage('404'), meta: { title: '404 Not Found'} }
];

const router = new VueRouter({
    routes,
    base: '/',
    mode: 'history',
    linkExactActiveClass: "active"
});

router.afterEach(to => document.title = to.meta.title);

new Vue({router, store: store}).$mount('#root')