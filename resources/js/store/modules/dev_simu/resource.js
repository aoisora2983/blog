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
	increment(state, { required }) {
		state.required++;
	},
};

export default {
	namespaced: true,
	state,
	mutations
};