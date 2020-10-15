<template>
  <v-form v-model="valid">
    <v-container>
      <v-row dense>
        <PromotionSelectForm
          v-if="promotion.length > 1"
          :items="promotion"
          :labelName="'Promotion'"
          :placeholder="placeholder === 'min' ? 1 : promotion.length"
          @updated="updatePromotion"
        />
        <InputNumberForm
          :selectPromotion="promotion.find(promo => promo.id === selectPromotion)"
          :placeholder="placeholder === 'min' ? 1 : promotion.find(promo => promo.id === selectPromotion).max"
          @updated="updateLevel"
        />
      </v-row>
      <v-row dense>
        <SkillSelectForm
          v-for="(skill, index) in skillList"
          :key="index"
          :index="index"
          :items="skill"
          :labelName="'Skill ' + index"
          :placeholder="placeholder === 'min' ? skill[0] : skill[skill.length-1]"
          :skillLevel="skillLevel"
          @updated="updateSkill"
        />
      </v-row>
    </v-container>
  </v-form>
</template>

<script>
import PromotionSelectForm from "../molecules/PromotionSelectForm";
import InputNumberForm from "../molecules/InputNumberForm";
import SkillSelectForm from "../molecules/SkillSelectForm";

export default {
  components: { PromotionSelectForm, InputNumberForm, SkillSelectForm },

  props: {
    promotion: {},
    skillList: {},
    placeholder: "",
  },

  data: () => ({
    valid: false,
    selectPromotion: null,
    inputLevel: null,
    selectSkill: {
      0: null,
      1: null,
      2: null,
    },
    skillLevel: null,
  }),

  created() {
    // 初期昇進id、レベル、スキルレベル設定
    // ID, Level
    let _promotion = this.promotion;
    if (this.placeholder === "min") {
      this.selectPromotion = _promotion[0].id;
      this.inputLevel = 1;
    } else {
      this.selectPromotion = _promotion[_promotion.length - 1].id;
      this.inputLevel = _promotion[_promotion.length - 1].max;
    }

    // Skill
    for (let index in this.selectSkill) {
      let skill = this.skillList[index];
      if (!skill) {
        this.selectSkill[index] = null;
        this.updateDevelop();
        return;
      }

      if (this.placeholder === "min") {
        this.selectSkill[index] = skill[0].level;
      } else {
        this.selectSkill[index] = skill[skill.length - 1].level;
      }
    }

    this.updateDevelop();
  },

  methods: {
    updatePromotion(value) {
      this.selectPromotion = value;
      this.updateDevelop();
    },
    updateLevel(value) {
      this.inputLevel = value;
      this.updateDevelop();
    },
    updateSkill(value) {
      this.selectSkill[value.index] = value.level;
      this.skillLevel = value.level;
      this.updateDevelop();
    },

    // 入力値を整理してemitする
    updateDevelop() {
      let array = {
        kind: this.placeholder === "min" ? "now" : "goal",
        promotion: this.selectPromotion,
        level: this.inputLevel,
        skill: {
          0: this.selectSkill[0],
          1: this.selectSkill[1],
          2: this.selectSkill[2],
        },
      };

      this.$emit("updated", array);
    },
  },
};
</script>