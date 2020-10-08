<template>
  <ul class="chara-card-list">
    <li
      v-for="character in characterList"
      :key="character.id"
    >
      <CharaCard
        :character="character"
        @updated="updateCharacterDevelop"
      />
    </li>
  </ul>
</template>

<script>
import CharaCard from "../molecules/CharaCard";
import { mapState, mapActions } from "vuex";

export default {
  components: {
    CharaCard,
  },

  props: {
    characterList: {},
  },

  computed: {
    ...mapState("develop", {
      developList: "developList",
    }),
  },

  methods: {
    ...mapActions("develop", {
      setDevelop: "setDevelop"
    }),
    updateCharacterDevelop: function ($characterId, $now, $goal) {
      this.setDevelop({characterId: $characterId, develop: {$now, $goal}})
    }
  },
};
</script>