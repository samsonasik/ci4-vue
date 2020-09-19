import createPage from './create-page.js';

let portfolio = createPage(
    'portfolio',
    {
        portfolio : [
            {
                title : 'loading...',
                image : '',
                link  : '',
            }
        ]
    },
    {
        search: function (e = null) {
            let keyword = e !== null
                ? e.target.value
                : '';

            if (typeof this.$store.state.portfolio.portfolio[keyword] !== 'undefined') {
                this.data.portfolio = this.$store.state.portfolio.portfolio[keyword];

                return;
            }

            if (sessionStorage.getItem('search-portfolio-' + keyword)) {
                let portfolio  = JSON.parse(sessionStorage.getItem('search-portfolio-' + keyword));
                this.$store.commit('portfolio/search', { keyword: keyword, value: portfolio });
                this.data.portfolio = portfolio;

                return;
            }

            (async () => {
                await new Promise( (resolve) => {
                    fetch(
                        '/api/portfolio?keyword=' + keyword,
                        {
                            method: 'GET',
                            headers: {
                                'Accept': 'application/json',
                            }
                        }
                    ).then(response =>  resolve(response.json()));
                }).then(result => this.data.portfolio = result);

                this.$store.commit('portfolio/search', { keyword: keyword, value: this.data.portfolio });
            })();
        }
    },
    function () {
        this.$nextTick(() => this.search());
    }
);

export default portfolio;