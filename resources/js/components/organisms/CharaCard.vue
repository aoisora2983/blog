<template>
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
      :skill="character.skill"
    />

    <h3>Goal</h3>
    <SimulateFormGroup
      :promotion="character.promotion"
      :skill="character.skill"
    />

  </v-card>
</template>

<script>
    import SimulateFormGroup from '../organisms/SimulateFormGroup';

    export default {
      components: { 
        SimulateFormGroup
      },
      
      props: {
        character: {},
      },
    }
</script>