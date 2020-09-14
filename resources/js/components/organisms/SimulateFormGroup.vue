<template>
  <v-form v-model="valid">
    <v-container>
      <v-row
        dense
      >
        <SelectPromotionForm
          :items="promotion"
         />
        <InputNumberForm />
      </v-row>
      <v-row dense>
        <SelectSkillForm
          :items="skill"
          :labelName="'Skill 1'"
         />
        <SelectSkillForm
          :items="skill"
          :labelName="'Skill 2'"
         />
        <SelectSkillForm
          :items="skill"
          :labelName="'Skill 3'"
         />
      </v-row>
    </v-container>
  </v-form>
</template>

<script>
    import SelectPromotionForm from '../molecules/SelectPromotionForm'
    import SelectSkillForm from '../molecules/SelectSkillForm'
    import InputNumberForm from '../molecules/InputNumberForm'

    export default {
      components: { SelectPromotionForm, SelectSkillForm, InputNumberForm },

      props: {
        promotion: {},
        skill: {},
      },

      data: () => ({
        valid: false,
      }),
    }
</script>