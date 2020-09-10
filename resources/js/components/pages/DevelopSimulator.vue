<template>
  <v-app id="inspire">
    <div>
      <v-app-bar
        color="accent-4"
        dense
        dark
      >
        <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>

        <v-toolbar-title>Page title</v-toolbar-title>

        <v-spacer></v-spacer>
        
      </v-app-bar>
    </div>

    <v-navigation-drawer
      v-model="drawer"
      absolute
      temporary
    >
      <v-list
        nav
        dense
      >
        <v-list-item-group
          v-model="group"
          active-class="text--accent-4"
        >
          <v-list-item>
            <v-list-item-title>Open Simulator</v-list-item-title>
          </v-list-item>

          <v-list-item>
            <v-list-item-title>Reverse Open Simulator</v-list-item-title>
          </v-list-item>

          <v-list-item>
            <v-list-item-title>Dev Simulator</v-list-item-title>
          </v-list-item>

        </v-list-item-group>
      </v-list>
    </v-navigation-drawer>

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
      <v-form v-model="valid">
        <v-container>
          <v-row
            dense
          >
            <v-col
              cols="6"
              md="4"
            >
              <v-select
                :items="promotion"
                label="Promotion"
                item-text="name"
                item-value="id"
                required
                dense
              ></v-select>  
            </v-col>
            <v-col
              cols="6"
              md="4"
            >            
              <v-text-field
                label="Lv"
                required
                dense
              ></v-text-field>
            </v-col>
          </v-row>
          <v-row dense>
            <v-col
              cols="4"
              md="4"
            >
              <v-select
                :items="skill1"
                label="Skill 1"
                required
                dense
              ></v-select>  
            </v-col>
            <v-col
              cols="4"
              md="4"
            >
              <v-select
                :items="skill2"
                label="Skill 2"
                required
                dense
              ></v-select>  
            </v-col>
            <v-col
              cols="4"
              md="4"
            >
              <v-select
                :items="skill3"
                label="Skill 3"
                required
                dense
              ></v-select>  
            </v-col>
          </v-row>
        </v-container>
      </v-form>

      <v-divider></v-divider>

      <h2>Goal</h2>
      <v-form v-model="valid">
        <v-container>
          <v-row
            dense
          >
            <v-col
              cols="6"
              md="4"
            >
              <v-select
                :items="promotion"
                item-text="name"
                item-value="id"
                label="Promotion"
                required
                dense
              ></v-select>  
            </v-col>
            <v-col
              cols="6"
              md="4"
            >            
              <v-text-field
                label="Lv"
                required
                dense
              ></v-text-field>
            </v-col>
          </v-row>
          <v-row dense>
            <v-col
              cols="4"
              md="4"
            >
              <v-select
                :items="skill1"
                label="Skill 1"
                required
                dense
              ></v-select>  
            </v-col>
            <v-col
              cols="4"
              md="4"
            >
              <v-select
                :items="skill2"
                label="Skill 2"
                required
                dense
              ></v-select>  
            </v-col>
            <v-col
              cols="4"
              md="4"
            >
              <v-select
                :items="skill3"
                label="Skill 3"
                required
                dense
              ></v-select>  
            </v-col>
          </v-row>
        </v-container>
      </v-form>

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
            <tr v-for="material in materials" :key="material.id">
              <td>{{ material.name }}</td>
              <td>
                <v-text-field
                  :prepend-icon="'mdi-minus'"
                  :append-outer-icon="'mdi-plus'"
                  v-model="material.required"
                  type="number"
                  @click:append-outer="plusMaterial"
                  @click:prepend="minusMaterial"
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
    
    export default {
        mounted() {
            console.log(this.$store.state.name);
        },

        methods: {
          plusMaterial () {

          },
          minusMaterial () {

          }
        },
        
        data: () => ({
          drawer: false,
          group: null,
          model: null,
          valid: false,
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
            skill1: 'skill1',
            skill2: 'skill2',
            skill3: 'skill3',
          }),
          // resource
          ...mapState('resource', {
            materials: 'materials'
          }),
          // stage
          ...mapState('stage', {
            stages: 'stages'
          })
        },

        watch: {
          group () {
            this.drawer = false
          },
        },
    }
</script>