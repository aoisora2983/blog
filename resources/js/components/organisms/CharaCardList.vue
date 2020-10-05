<template>
  <ul class="chara-card-list">
    <li
      v-for="character in characterList"
      :key="character.id"
    >

      <v-card
        class="mx-auto"
        max-width="500"
        outlined
      >
        <v-list-item>
          <v-list-item-content>
            <div class="overline mb-4">{{ character.rarity }}</div>
            <v-list-item-title class="headline mb-1">{{ character.name }}</v-list-item-title>
            <v-list-item-subtitle>{{ character.job }}</v-list-item-subtitle>
          </v-list-item-content>

          <v-list-item-avatar
            tile
            size="95"
            color="grey"
          ></v-list-item-avatar>
        </v-list-item>

        <h3>Now</h3>
        <SimulateFormGroup
          :promotion="character.promotion"
          :skillList="character.skill"
          :placeholder="'min'"
          @updated="updateDevelop"
        />

        <h3>Goal</h3>
        <SimulateFormGroup
          :promotion="character.promotion"
          :skillList="character.skill"
          :placeholder="'max'"
          @updated="updateDevelop"
        />

      </v-card>
    </li>
  </ul>
</template>

<script>
import SimulateFormGroup from "../organisms/SimulateFormGroup";
import { mapState, mapActions } from "vuex";

export default {
  components: {
    SimulateFormGroup,
  },

  props: {
    characterList: {},
  },

  computed: {
    ...mapState("develop", {
      now: "now",
      goal: "goal",
    }),
  },

  methods: {
    ...mapActions("develop", {
      setNow: "setNow",
      setGoal: "setGoal",
    }),
    updateDevelop: function (value) {
      if (value.kind === "now") {
        this.setNow(value);
      } else {
        this.setGoal(value);
      }
    },
  },
};
</script>