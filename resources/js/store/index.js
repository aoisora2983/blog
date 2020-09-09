"use strict"

import Vue from "vue";
import Vuex from "vuex";
import search from "./modules/dev_simu/search"
import character from "./modules/dev_simu/character"
import develop from "./modules/dev_simu/develop"

Vue.use(Vuex);

export default new Vuex.Store({
	modules: {
		character,
		search,
		develop
	}
});