const state = {
	promotion: [
		{ id: 1, name: '未昇進' },
		{ id: 2, name: '昇進I' },
		{ id: 3, name: '昇進II' }
	],
	level: 1,
	skill: [
		{ id: 1, name: '1' },
		{ id: 2, name: '2' },
		{ id: 3, name: '3' },
		{ id: 4, name: '4' },
		{ id: 5, name: '5' },
		{ id: 6, name: '6' },
		{ id: 7, name: '7' },
		{ id: 8, name: '特化1' },
		{ id: 9, name: '特化2' },
		{ id: 10, name: '特化3' },
	],
	now: {
		nowPromotion: null,
		nowLevel: null,
		nowSkill1: null,
		nowSkill2: null,
		nowSkill3: null,
	},
	goal: {
		goalPromotion: null,
		goalLevel: null,
		goalSkill1: null,
		goalSkill2: null,
		goalSkill3: null,
	},
};

const mutations = {
};

export default {
	namespaced: true,
	state,
	mutations
};