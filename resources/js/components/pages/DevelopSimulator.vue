<template>
  <v-app id="inspire">
    <NavBar />

    <div id="contents">
      <CharaSearch :characterList="characterSearchList" />

      <div v-if="characterList.length">

        <CharaCardList :characterList="characterList" />

        <v-btn
          block
          color="primary"
          dark
          @click="simulate"
        >Simulate</v-btn>

      </div>

      <div v-if="materialList.length">

        <h2>Required Material</h2>
        <MaterialCardList :materialList="materialList" />

        <v-btn
          block
          color="primary"
          dark
        >Simulate Stage</v-btn>

      </div>

      <div v-if="stageList.length">

        <h2>
          Required Stage Trial
          <v-tooltip top>
            <template v-slot:activator="{ on, attrs }">
              <v-icon
                medium
                v-bind="attrs"
                v-on="on"
              >mdi-comment-alert</v-icon>
            </template>
            <span>This is not Sure</span>
          </v-tooltip>
        </h2>
        <StageTable :stageList="stageList" />

      </div>
    </div>

  </v-app>
</template>

<script>
import { mapState, mapActions } from "vuex";

import NavBar from "../organisms/NavBar";
import CharaSearch from "../organisms/CharaSearch";
import SimulateFormGroup from "../organisms/SimulateFormGroup";
import MaterialCardList from "../organisms/MaterialCardList";
import StageTable from "../organisms/StageTable";
import CharaCardList from "../organisms/CharaCardList";

export default {
  components: {
    NavBar,
    CharaSearch,
    CharaCardList,
    SimulateFormGroup,
    MaterialCardList,
    StageTable,
  },

  mounted() {
    this.getCharacterList();
  },

  methods: {
    ...mapActions("search", {
      getCharacterList: "getCharacterList",
    }),
    ...mapActions("resource", {
      getMaterial: "getMaterial",
    }),
    ...mapActions("stage", {
      getStage: "getStage",
    }),

    simulate: function () {
      // 素材取得
      this.getMaterial(this.developList);

      // ステージ取得
      this.getStage(this.materialList);
    },
  },

  computed: {
    // search
    ...mapState("search", {
      characterSearchList: "list",
    }),
    // chara
    ...mapState("character", {
      characterList: "character",
    }),
    // develop
    ...mapState("develop", {
      developList: "list"
    }),
    // materials
    ...mapState("resource", {
      materialList: "materials",
    }),
    // stage
    ...mapState("stage", {
      stageList: "stages",
    }),
  },

  watch: {
    group() {
      this.drawer = false;
    },
  },
};
</script>