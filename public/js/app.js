createPage = (name, data = {}, methods = {}) => {
    return Vue.component('page-' + name, {
        data: () => Object.assign({ content: 'Loading...'}, data),
        methods: methods,
        mounted () {
            (new Promise( (resolve) => {
                fetch(
                    this.$route.path,
                    {
                        method: 'GET',
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                        }
                    }
                ).then(response =>  resolve(response.text()));
            })).then(result => this.content = result);
        },
        render : function (c) {
            if (this.content == '') {
                return;
            }

            return c(Vue.compile('<div>' + this.content + '</div>'));
        }
    });
}

const routes = [
    { path: '/', component: createPage('home') },
    { path: '/about', component: createPage('about') },
    { path: '/contact', component: createPage('contact') },
    { path: '/portfolio', component: createPage(
        'portfolio',
        {
            portfolio : []
        },
        {
            search: function (e) {
                let keyword = e.target.value;

                if (typeof store.state.portfolio[keyword] !== 'undefined') {
                    this.portfolio = store.state.portfolio[keyword];

                    return;
                }

                if (sessionStorage.getItem('search-' + keyword)) {
                    portfolio     = JSON.parse(sessionStorage.getItem('search-' + keyword));
                    store.commit('search', { keyword: keyword, value: portfolio });
                    this.portfolio = portfolio;

                    return;
                }

                (async () => {
                    await new Promise( (resolve) => {
                        fetch(
                            '/api/portfolio?keyword=' + keyword,
                            {
                                method: 'GET',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'Accept': 'application/json',
                                }
                            }
                        ).then(response =>  resolve(response.json()));
                    }).then(result => this.portfolio = result);

                    store.commit('search', { keyword: keyword, value: this.portfolio });
                })();
            }
        }
    ) },
    { path: '*', component: createPage('404') }
];

const router = new VueRouter({
    routes,
    base: '/',
    mode: 'history',
    linkExactActiveClass: "active"
});
const app    = new Vue({router}).$mount('#root')