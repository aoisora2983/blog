const state = {
	name: 'Silver Ash',
	job: 'Warrior',
	rarity: 6
};

const mutations = {
	setName(state, { characterName }) {
		state.characterName = characterName;
	}
};

export default {
	namespaced: true,
	state,
	mutations
};