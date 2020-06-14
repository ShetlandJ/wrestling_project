import Vue from 'vue';
import Vuex from 'vuex';

import auth from './auth';
import promotion from './promotion';

Vue.use(Vuex);

const modules = {
    auth,
    promotion,
};

const store = new Vuex.Store({ modules });

export default store;
