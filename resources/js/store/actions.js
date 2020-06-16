import axios from 'axios'

export default {
    load({ dispatch, rootGetters }, id, url) {
        return axios.get(url)
            .then(item => dispatch('insert', item))
    },
    loadWithFilters({ dispatch, rootGetters }, payload) {
        return axios.get(payload.url, payload)
            .then(item => dispatch('insert', item))
    },
    insert({ commit }, newItems) {
        commit('insert', newItems);
    },
}
