<template>
  <v-col>
    <v-select
      v-model="model"
      :items="items"
      :label="labelName"
      item-text="name"
      item-value="level"
      required
      dense
      @change="onChange()"
    ></v-select>
  </v-col>
</template>

<script>
export default {
  props: {
    index: 0,
    items: {},
    labelName: "",
    placeholder: null,
    skillLevel: null,
  },

  data: () => ({
    model: null,
  }),

  created() {
    this.model = this.placeholder.level;
  },

  methods: {
    onChange() {
      this.$emit("updated", {
        index: this.index,
        level: this.model,
      });
    },
  },

  watch: {
    skillLevel: function (val) {
      const commonMax = 7;
      let _model = this.model;
      // 他の選択値が6以下なら他のセレクトボックスの特化を外して揃える
      if (val < commonMax) {
        this.model = this.items.find((item) => item.level === val).level;
      } else {
        // 他の選択値が7以上なら特化はそのままに、6以下なら7に引き上げる
        if (_model < commonMax) {
          this.model = this.items.find((item) => item.level === commonMax).level;
        }
      }

      if (_model !== this.model) {
        this.onChange();
      }
    },
  },
};
</script>