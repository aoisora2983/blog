const state = {
	materials: [
		{
			id: 1,
			name: 'stone',
			img: '',
			required: 7000,
		},
		{
			id: 2,
			name: 'suger',
			img: '',
			required: 12,
		}
	]
};

const mutations = {
	increment(state, target) {
		state.materials[target].required++;
	},
	decrement(state, target) {
		state.materials[target].required--;
	},
};

const actions = {
	increment(store, target) {
		store.commit('increment', target);
	},
	decrement(store, target) {
		store.commit('decrement', target);
	}
}

export default {
	namespaced: true,
	state,
	mutations,
	actions
};