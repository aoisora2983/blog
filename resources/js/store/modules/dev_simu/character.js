import Axios from "axios";

const state = {
	character: []
};

const mutations = {
	setData(state, character) {
		state.character = [character];
	}
};

const actions = {
	getCharacter(store, id) {
		Axios.post('/api/character', {
			id: id
		})
			.then(res => {
				store.commit('setData', res.data);
			}).catch(error => {
				console.log('[Error]' + error);
			});
	}
};

const getters = {
	get(state) {
		return state.list;
	}
}

export default {
	namespaced: true,
	state,
	mutations,
	actions,
	getters
};