const state = {
	devList: [
		{
			id: null,
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
		}
	]
};

const mutations = {
};

export default {
	namespaced: true,
	state,
	mutations
};