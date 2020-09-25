<template>
  <v-col>            
    <v-text-field
      v-model="selectPromotion.max"
      label="Lv"
      type="number"
      required
      dense
    ></v-text-field>
  </v-col>
</template>

<script>
    export default {
      props: {
        selectPromotion: {},
      }
    }
</script>