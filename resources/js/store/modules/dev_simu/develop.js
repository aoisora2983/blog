const state = {
    developList: []
};

const mutations = {
    setDevelop(state, { characterId, develop }) {
        state.developList[characterId] = [develop];
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
