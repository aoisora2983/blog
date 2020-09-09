const state = {
	list: [
		{ id: 1, name: 'Silver Ash' },
		{ id: 2, name: 'Cliff Heart' }
	]
};

const mutations = {
	setName(state, { list }) {
		state.list = list;
	}
};

export default {
	namespaced: true,
	state,
	mutations
};