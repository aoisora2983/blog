import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

// コンポーネントをインポート
import index from "./components/pages/Index.vue";
import simulator from "./components/pages/DevelopSimulator.vue";
// import tagSimulator from "./components/pages/OpenTagSimulator.vue";

export default new VueRouter({
    // モードの設定
    mode: "history",
    routes: [
        {
            path: "/",
            name: "index",
            component: index
        },
        {
            path: "/simulator",
            name: "simulator",
            component: simulator
        },
    ]
});
