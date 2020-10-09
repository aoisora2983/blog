const state = {
    list: []
};

const mutations = {
    setDevelop(state, { characterId, develop }) {
        state.list = [{ 'characterId': characterId, 'develop': develop }];
    },
};

const actions = {
    setDevelop(store, { characterId, develop }) {
        store.commit("setDevelop", { characterId, develop });
    },
};

export default {
    namespaced: true,
    state,
    mutations,
    actions
};
