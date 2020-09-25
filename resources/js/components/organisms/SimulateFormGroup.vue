<template>
  <v-form v-model="valid">
    <v-container>
      <v-row
        dense
      >
        <SelectForm
          v-if="promotion !== null"
          :items="promotion"
          :labelName="'Promotion'"
          @updated="updatePromotion" 
         />
        <InputNumberForm 
          :selectPromotion="promotion.find(promo => promo.id === selectPromotion)"
        />
      </v-row>
      <v-row dense>
        <SelectForm
          v-if="skill.skill1 !== null"
          :items="skill.skill1"
          :labelName="'Skill 1'"
         />
        <SelectForm
          v-if="skill.skill2 !== null"
          :items="skill.skill2"
          :labelName="'Skill 2'"
         />
        <SelectForm
          v-if="skill.skill3 !== null"
          :items="skill.skill3"
          :labelName="'Skill 3'"
         />
      </v-row>
    </v-container>
  </v-form>
</template>

<script>
    import SelectForm from '../molecules/SelectForm'
    import InputNumberForm from '../molecules/InputNumberForm'

    export default {
      components: { SelectForm, InputNumberForm },

      props: {
        promotion: {},
        skill: {},
      },

      data: () => ({
        valid: false,
        selectPromotion: null,
        selectLv: null,
        selectSkill1: null,
        selectSkill2: null,
        selectSkill3: null,
      }),

      methods: {
        updatePromotion(value) {
          this.selectPromotion = value;
        }
      }
    }
</script>