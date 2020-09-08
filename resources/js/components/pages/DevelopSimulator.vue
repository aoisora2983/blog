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
        :items="states"
        :label="`Please Input or Select`"
        persistent-hint
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
              <div class="overline mb-4">Rarity</div>
              <v-list-item-title class="headline mb-1">CharacterName</v-list-item-title>
              <v-list-item-subtitle>CharacterJob</v-list-item-subtitle>
            </v-list-item-content>

            <v-list-item-avatar
              tile
              size="95"
              color="grey"
            ></v-list-item-avatar>
          </v-list-item>

          <v-card-actions>
            <v-btn text>Add</v-btn>
          </v-card-actions>
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
                :items="items"
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
                v-model="name"
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
                :items="items"
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
                :items="items"
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
                :items="items"
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
                :items="items"
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
                v-model="name"
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
                :items="items"
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
                :items="items"
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
                :items="items"
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
            <tr>
              <td>Stone</td>
              <td>
                <v-text-field
                  :prepend-icon="'mdi-minus'"
                  :append-outer-icon="'mdi-plus'"
                  value="7000"
                  type="number"
                  @click:append-outer="plusMaterial"
                  @click:prepend="minusMaterial"
                ></v-text-field>
              </td>
            </tr>
            <tr>
              <td>Suger</td>
              <td>
                <v-text-field
                  :prepend-icon="'mdi-minus'"
                  :append-outer-icon="'mdi-plus'"
                  value="12"
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
            <tr>
              <td>1-7</td>
              <td>
                7000
              </td>
              <td>
                42000
              </td>
            </tr>
          </tbody>
          <tbody>
            <tr>
              <td>Stage Name</td>
              <td>
                6
              </td>
              <td>
                42
              </td>
            </tr>
          </tbody>
        </template>
      </v-simple-table>

    </div>
  </v-app>
</template>

<script>
    import { mapActions } from 'vuex';
    
    export default {
        mounted() {
            console.log(this.$store);
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
          // autocomplete
          states: [
            'Alabama', 'Alaska', 'American Samoa', 'Arizona',
            'Arkansas', 'California', 'Colorado', 'Connecticut',
            'Delaware', 'District of Columbia', 'Federated States of Micronesia',
            'Florida', 'Georgia', 'Guam', 'Hawaii', 'Idaho',
            'Illinois', 'Indiana', 'Iowa', 'Kansas', 'Kentucky',
            'Louisiana', 'Maine', 'Marshall Islands', 'Maryland',
            'Massachusetts', 'Michigan', 'Minnesota', 'Mississippi',
            'Missouri', 'Montana', 'Nebraska', 'Nevada',
            'New Hampshire', 'New Jersey', 'New Mexico', 'New York',
            'North Carolina', 'North Dakota', 'Northern Mariana Islands', 'Ohio',
            'Oklahoma', 'Oregon', 'Palau', 'Pennsylvania', 'Puerto Rico',
            'Rhode Island', 'South Carolina', 'South Dakota', 'Tennessee',
            'Texas', 'Utah', 'Vermont', 'Virgin Island', 'Virginia',
            'Washington', 'West Virginia', 'Wisconsin', 'Wyoming',
          ],
          // selectbox
          valid: false,
          items: [
            'hoge',
            'fuga'
          ],
          // lvBox
          name: 1,
        }),

        watch: {
          group () {
            this.drawer = false
          },
        },
    }
</script>