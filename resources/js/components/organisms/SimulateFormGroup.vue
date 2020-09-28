<template>
  <v-form v-model="valid">
    <v-container>
      <v-row
        dense
      >
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
          v-for="(skill, index) in skillList" :key="index"
          :items="skill"
          :labelName="'Skill ' + index"
          :placeholder="placeholder === 'min' ? skill[0] : skill[skill.length-1]"
          @updated="updateSkill" 
         />
      </v-row>
    </v-container>
  </v-form>
</template>

<script>
    import PromotionSelectForm from '../molecules/PromotionSelectForm'
    import InputNumberForm from '../molecules/InputNumberForm'
    import SkillSelectForm from '../molecules/SkillSelectForm'

    export default {
      components: { PromotionSelectForm, InputNumberForm, SkillSelectForm },

      props: {
        promotion: {},
        skillList: {},
        placeholder: '',
      },

      data: () => ({
        valid: false,
        selectPromotion: 1,
        inputLevel: null,
        selectSkill1: null,
        selectSkill2: null,
        selectSkill3: null,
      }),

      methods: {
        updatePromotion(value) {
          this.selectPromotion = value;
        },
        updateSkill(value) {
        },
        updateLevel(value) {
          
        }
      }
    }
</script>