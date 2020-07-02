let portfolioStoreModule = {
    namespaced: true,
    state: {
        portfolio : []
    },
    mutations: {
        search (state, data) {
            sessionStorage.setItem('search-portfolio-' + data.keyword, JSON.stringify(data.value));
            state.portfolio[data.keyword] = data.value;
        }
    }
}

export default portfolioStoreModule;