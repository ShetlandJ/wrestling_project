import axios from 'axios'
import actions from './actions';
import mutations from './mutations';

axios.defaults.baseURL = 'http://localhost:8000/api'

export default {
    namespaced: true,
    state: {
        promotions: []
    },
    mutations: {
        ...mutations,
        setPromotions(state, promotions) {
            state.promotions = promotions.data
        },
    },
    actions: {
        ...actions,
        getPromotions({ commit }) {
            return axios
                .get('/promotions')
                .then(({ data }) => {
                    commit('setPromotions', data)
                })
        },
    },
    getters: {
        promotions: state => state.promotions,
        findByAlias: state => name => state.promotions.find(record => record.alias.toLowerCase() === name.toLowerCase()) || {},
    }
};
