const state = {
	material: [
		{
			id: 1,
			name: 'stone',
			img: '',
			required: 7000,
		}
	]
};

const mutations = {
	increment(state, { characterName }) {

	},
	setName(state, { characterName }) {
		state.characterName = characterName;
	}
};

export default {
	namespaced: true,
	state,
	mutations
};