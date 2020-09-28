<template>
  <v-col>
    <v-select
      v-model="model"
      :items="items"
      :label="labelName"
      item-text="name"
      item-value="id"
      required
      dense
      @change="onChange()"
    ></v-select>  
  </v-col>
</template>

<script>
    export default {
      props: {
        items: {},
        labelName: '',
        placeholder: null,
      },

      data: () => ({
        model: null,
      }),

      created() {
        this.model = this.placeholder;
      },

      methods: {
        onChange() {
          this.$emit('updated', this.model)
        }
      }
    }
</script>