import Axios from "axios";

const state = {
    materials: []
};

const mutations = {
    increment(state, target) {
        state.materials[target].required++;
    },
    decrement(state, target) {
        state.materials[target].required--;
    },
    remove(state, target) {
        state.materials.splice(target, target + 1);
    },

    // api
    setData(state, materials) {
        state.materials = materials;
    }
};

const actions = {
    increment(store, target) {
        store.commit("increment", target);
    },
    decrement(store, target) {
        store.commit("decrement", target);
    },
    remove(store, target) {
        store.commit("remove", target);
    },

    // api
    getMaterial(store, developList) {
        Axios.post("/api/material", {
            developList: developList
        })
            .then(res => {
                store.commit("setData", res.data);
            })
            .catch(error => {
                console.log("[Error]" + error);
            });
    }
};

export default {
    namespaced: true,
    state,
    mutations,
    actions
};
