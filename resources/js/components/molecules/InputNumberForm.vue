<template>
  <v-col>            
    <v-text-field
      v-model="model"
      label="Lv"
      type="number"
      required
      dense
      :error-messages="inputError"
      @input="onChange()"
    ></v-text-field>
  </v-col>
</template>

<script>
    export default {
      props: {
        selectPromotion: {},
        placeholder: null,
      },

      data: () => ({
        min: 1,
        model: 1,
      }),

      created() {
        this.model = this.placeholder;
      },

      computed: {
        inputError: function() {
          var max = this.selectPromotion.max;
          const errors = [];
          // 最大値チェック
          if (this.model > max) {
            errors.push('less than' + max);
          }
          if (this.model < this.min) {
            errors.push('more than' + this.min);
          }

          return errors;
        }
      },

      methods: {
        onChange() {
          this.$emit('updated', this.model)
        }
      }
    }
</script>