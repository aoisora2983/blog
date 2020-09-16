<template>
  <v-col>
    <v-select
      :items="items"
      :label="labelName"
      item-text="name"
      item-value="id"
      required
      dense
    ></v-select>  
  </v-col>
</template>

<script>
    export default {
      props: {
        items: {},
        labelName: '',
      },
    }
</script>