const state = {
	name: 'Silver Ash',
	job: 'Warrior',
	rarity: 6,
	img: ''
};

const mutations = {
	setName(state, { name }) {
		state.name = name;
	}
};

export default {
	namespaced: true,
	state,
	mutations
};