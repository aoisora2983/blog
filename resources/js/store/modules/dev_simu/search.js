import Axios from "axios";

const state = {
	list: [],
	activeId: null
};

const mutations = {
	setData(state, list) {
		state.list = list;
	}
};

const actions = {
	getCharacterList(store) {
		Axios.get('/api/character')
			.then(res => {
				store.commit('setData', res.data);
			}).catch(error => {
				console.log('[Error]' + error);
			});
	}
};

const getters = {
	getList(state) {
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