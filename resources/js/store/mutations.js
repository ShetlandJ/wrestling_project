import Vue from 'vue';

export default {
    insert({state}, newItems) {
        const records = Array.isArray(newItems) ? newItems : [newItems];
        records.forEach((record) => {
            const index = state.data.findIndex(item => item.id === record.id);

            if (index !== -1) {
                Vue.set(state.data, index, record);
            } else {
                state.data.push(record);
            }
        });
    },
    remove(state, id) {
        Vue.set(state, 'data', state.data.filter(item => item.id !== id));
    },
    clearAll(state) {
        state.data = [];
    },
};
