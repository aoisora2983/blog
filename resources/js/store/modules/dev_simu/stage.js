const state = {
	stages: [
		{
			id: 1,
			name: '1-7',
			img: '',
			required: 7000,
			stamina: 42000,
		},
		{
			id: 2,
			name: 'name',
			img: '',
			required: 6,
			stamina: 12,
		}
	]
};

const mutations = {
	// api
	setData(state, stages) {
		state.stages = stages;
	}
};

const actions = {
	// api
	getStage(store, materialList) {
		Axios.post("/api/stage", {
			materialList: materialList
		})
			.then(res => {
				store.commit("setData", res.data);
			})
			.catch(error => {
				console.log("[Error]" + error);
			});
	}
};

export default {
	namespaced: true,
	state,
	mutations,
	actions
};