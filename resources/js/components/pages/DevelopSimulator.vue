<template>
  <v-app id="inspire">
    <NavBar />

    <div id="contents">
      <v-autocomplete
        v-model="model"
        :hint="'hint text'"
        :items="characterSearch"
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

      <div class="chara-card-list">
        <v-card
          class="mx-auto"
          max-width="344"
          outlined
        >
          <v-list-item>
            <v-list-item-content>
              <div class="overline mb-4">{{ characterRarity }}</div>
              <v-list-item-title class="headline mb-1">{{ characterName }}</v-list-item-title>
              <v-list-item-subtitle>{{ characterJob }}</v-list-item-subtitle>
            </v-list-item-content>

            <v-list-item-avatar
              tile
              size="95"
              color="grey"
            ></v-list-item-avatar>
          </v-list-item>

        </v-card>
      </div>

      <h2>Now</h2>
      <SimulateFormGroup
        :promotion="promotion"
        :skill="skill"
      />

      <v-divider></v-divider>

      <h2>Goal</h2>
      <SimulateFormGroup
        :promotion="promotion"
        :skill="skill"
      />

      <v-btn block color="primary" dark>Simulate</v-btn>

      <v-divider></v-divider>

      <h2>Required Material</h2>
      <v-simple-table>
        <template v-slot:default>
          <thead>
            <tr>
              <th class="text-left">Material</th>
              <th class="text-left">Required</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(material, index) in materials" :key="material.id">
              <td>{{ material.name }}</td>
              <td>
                <v-text-field
                  :prepend-icon="'mdi-minus'"
                  :append-outer-icon="'mdi-plus'"
                  v-model="material.required"
                  type="number"
                  @click:append-outer="materialIncrement(index)"
                  @click:prepend="materialDecrement(index)"
                ></v-text-field>
              </td>
            </tr>
          </tbody>
        </template>
      </v-simple-table>

      <v-btn block color="primary" dark>Simulate Stage</v-btn>
      <v-divider></v-divider>

      <h2>Required Stage Trial</h2>
      <v-simple-table>
        <template v-slot:default>
          <thead>
            <tr>
              <th class="text-left">Stage</th>
              <th class="text-left">Required</th>
              <th class="text-left">Stamina</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="stage in stages" :key="stage.id">
              <td>{{ stage.name }}</td>
              <td>{{ stage.required }}</td>
              <td>{{ stage.stamina}}</td>
            </tr>
          </tbody>
        </template>
      </v-simple-table>

    </div>
  </v-app>
</template>

<script>
    import { mapState, mapActions } from 'vuex';
    
    import NavBar from '../organisms/NavBar'
    import SimulateFormGroup from '../organisms/SimulateFormGroup'

    export default {
        components: { NavBar, SimulateFormGroup },

        mounted() {
            this.getCharacterList();
        },

        methods: {
          ...mapActions('resource', {
            materialIncrement: 'increment',
            materialDecrement: 'decrement'
          }),
          ...mapActions('search', {
            getCharacterList: 'getCharacterList',
          }),
        },
        
        data: () => ({
          model: null,
        }),

        computed: {
          // search
          ...mapState('search', {
            characterSearch: 'list',
          }),
          // chara
          ...mapState('character', {
            characterName: 'name',
            characterJob: 'job',
            characterRarity: 'rarity',
          }),
          // now - goal
          ...mapState('develop', {
            promotion: 'promotion',
            skill: 'skill',
          }),
          // resource
          ...mapState('resource', {
            materials: 'materials'
          }),
          // stage
          ...mapState('stage', {
            stages: 'stages'
          }),
        },

        watch: {
          group () {
            this.drawer = false
          },
        },
    }
</script>