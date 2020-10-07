const state = {
    characterId: null,
    now: null,
    goal: null
};

const mutations = {
    setNow(state, now) {
        state.now = now;
    },
    setGoal(state, goal) {
        state.goal = goal;
    }
};

const actions = {
    setNow(store, now) {
        store.commit("setNow", now);
    },
    setGoal(store, goal) {
        store.commit("setGoal", goal);
    }
};

export default {
    namespaced: true,
    state,
    mutations,
    actions
};
