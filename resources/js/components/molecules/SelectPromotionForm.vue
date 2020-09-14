<template>
  <v-col
    cols="6"
    md="4"
  >
    <v-select
      :items="items"
      item-text="name"
      item-value="id"
      label="Promotion"
      required
      dense
    ></v-select>  
  </v-col>
</template>

<script>
    export default {
      props: {
        items: {},
      },
    }
</script>