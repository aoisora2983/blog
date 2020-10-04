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
    this.model = this.placeholder;
  },

  methods: {
    onChange() {
      let selectSkill = this.items.find((item) => item.id === this.model);
      this.$emit("updated", {
        index: this.index,
        id: selectSkill.id,
        level: selectSkill.level,
      });
    },
  },

  watch: {
    skillLevel: function (val) {
      const commonMax = 7;
      let _model = this.model;
      // 他の選択値が6以下なら他のセレクトボックスの特化を外して揃える
      if (val < commonMax) {
        this.model = this.items.find((item) => item.level === val).id;
      } else {
        // 他の選択値が7以上なら特化はそのままに、6以下なら7に引き上げる
        let id = this.model;
        if (!Number.isInteger(this.model)) {
          id = this.model.id;
        }

        let now = this.items.find((item) => item.id === id).level;
        if (now < commonMax) {
          this.model = this.items.find((item) => item.level === commonMax).id;
        }
      }

      if (_model !== this.model) {
        this.onChange();
      }
    },
  },
};
</script>