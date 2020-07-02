import createPage from './create-page.js';

let portfolio = createPage(
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
);

export default portfolio;