import home       from './home.js';
import about      from './about.js';
import contact    from './contact.js';
import portfolio  from './portfolio.js';
import store      from './store.js';
import createPage from './create-page.js';

const { createRouter, createWebHistory } = VueRouter;

const routes = [
    { path: '/', component: home, meta: { title: 'Home'}  },
    { path: '/about', component: about, meta: { title: 'About'}  },
    { path: '/contact', component: contact, meta: { title: 'Contact'}  },
    { path: '/portfolio', component: portfolio, meta: { title: 'Portfolio'}  },
    { path: '/:pathMatch(.*)*', name: 'NotFound', component: createPage('notFound'), meta: { title: 'Page Not Found' } }
];

const router = createRouter({
    history: createWebHistory(),
    routes: routes,
    base: '/',
    linkExactActiveClass: "active"
});

router.afterEach(to => document.title = to.meta.title);

const app = Vue.createApp({});
app.use(router);
app.use(store);

router.isReady().then(() => app.mount('#root'))