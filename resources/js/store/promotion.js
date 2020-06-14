import axios from 'axios'

axios.defaults.baseURL = 'http://localhost:8000/api'

export default {
    namespaced: true,
    state: {
        promotions: {
            data: []
        }
    },
    mutations: {
        setPromotions(state, promotions) {
            state.promotions.data = promotions.data
        },
    },
    actions: {
        getPromotions({ commit }) {
            return axios
                .get('/promotions')
                .then(({ data }) => {
                    commit('setPromotions', data)
                })
        },
    },
    getters: {
        promotions: state => state.promotions.data,
        findByAlias: state => name => state.promotions.data.find(record => record.alias.toLowerCase() === name.toLowerCase()) || [],
    }
};
