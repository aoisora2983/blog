<template>
  <ul class="material-card-list">
    <li
      v-for="(material, index) in materialList"
      :key="material.id"
    >
      <v-card
        max-width="150"
        outlined
      >
        <v-container>
          <v-card-text>
            <v-row justify="space-between">
              <p>{{ material.name }}</p>
              <v-btn
                icon
                small
                @click="materialRemove(index)"
              >
                <v-icon>mdi-close</v-icon>
              </v-btn>
            </v-row>
          </v-card-text>

          <v-img
            :src="material.src"
            class="white--text align-end"
            gradient="to bottom, rgba(0,0,0,.1), rgba(0,0,0,.5)"
            height="100px"
          >

          </v-img>

          <v-card-actions>
            <v-spacer></v-spacer>

            <v-btn
              icon
              @click="materialIncrement(index)"
            >
              <v-icon>mdi-plus</v-icon>
            </v-btn>

            <v-text-field
              v-model="material.required"
              type="number"
            ></v-text-field>

            <v-btn
              icon
              @click="materialDecrement(index)"
            >
              <v-icon>mdi-minus</v-icon>
            </v-btn>
          </v-card-actions>
        </v-container>
      </v-card>

    </li>
  </ul>
</template>

<script>
import { mapState, mapActions } from "vuex";

export default {
  props: {
    materialList: {},
  },

  methods: {
    ...mapActions("resource", {
      materialIncrement: "increment",
      materialDecrement: "decrement",
      materialRemove: "remove",
    }),
  },
};
</script>