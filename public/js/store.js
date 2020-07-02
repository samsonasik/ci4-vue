import portfolioStoreModule from './portfolio-store-module.js';

const store = new Vuex.Store({
    modules: {
        portfolio: portfolioStoreModule
    }
});

export default store;