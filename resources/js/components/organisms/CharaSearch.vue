<template>
  <v-autocomplete
    v-model="model"
    :hint="'hint text'"
    :items="characterList"
    :label="`Please Input or Select`"
    persistent-hint
    item-text="name"
    item-value="id"
    prepend-icon="mdi-magnify"
  >
    <template v-slot:append-outer>
      <v-slide-x-reverse-transition
        mode="out-in"
      >
      </v-slide-x-reverse-transition>
    </template>
  </v-autocomplete>
</template>

<script>
    import { mapActions } from 'vuex';

    export default {
      props: {
        characterList: {},
      },

      data: () => ({
        model: null,
      }),

      methods: {
          ...mapActions('character', {
            getCharacter: 'getCharacter',
          }),
      },

      watch: {
        model: function (val) {
          this.getCharacter(val);
        }
      }
    }
</script>