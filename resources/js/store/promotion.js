import axios from 'axios'

axios.defaults.baseURL = 'http://localhost:8000/api'

export default {
    state: {
        promotions: null
    },
    mutations: {
        setPromotions(state, promotions) {
            state.user = promotions
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
        promotions: state => state.promotions,
    }
};
