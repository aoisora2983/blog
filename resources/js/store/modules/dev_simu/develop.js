const state = {
	promotion: [
		{ id: 1, name: '未昇進' },
		{ id: 2, name: '昇進I' },
		{ id: 3, name: '昇進II' }
	],
	level: 1,
	skill1: [1, 2, 3, 4, 5, 6, 7, '特化1', '特化2', '特化3'],
	skill2: [1, 2, 3, 4, 5, 6, 7, '特化1', '特化2', '特化3'],
	skill3: [1, 2, 3, 4, 5, 6, 7, '特化1', '特化2', '特化3'],
};

const mutations = {
	setName(state, { promotion }) {
		state.promotion = promotion;
	}
};

export default {
	namespaced: true,
	state,
	mutations
};