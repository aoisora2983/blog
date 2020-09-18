<template>
  <v-app id="inspire">
    <NavBar />


    <div id="contents">
      <CharaSearch
        :characterList="characterSearchList"
       />

      <div
        v-if="characterList.length"
      >
        <ul 
          class="chara-card-list"
        >
          <li
              v-for="character in characterList" :key="character.id"
          >
            <CharaCard
              :character="character"
            />
          </li>
        </ul>

        <v-btn block color="primary" dark>Simulate</v-btn>

        <h2>Required Material</h2>
        <MaterialCard />

        <v-btn block color="primary" dark>Simulate Stage</v-btn>

        <h2>
          Required Stage Trial
          <v-tooltip top>
            <template v-slot:activator="{ on, attrs }">
              <v-icon
                medium
                v-bind="attrs"
                v-on="on"
              >mdi-comment-alert</v-icon>
            </template>
            <span>This is not Sure</span>
          </v-tooltip>
        </h2>
        <StageTable 
          :stages="stages"
        />
      </div>

    </div>
  </v-app>
</template>

<script>
    import { mapState, mapActions } from 'vuex';
    
    import NavBar from '../organisms/NavBar';
    import CharaSearch from '../organisms/CharaSearch';
    import SimulateFormGroup from '../organisms/SimulateFormGroup';
    import MaterialCard from '../organisms/MaterialCard';
    import StageTable from '../organisms/StageTable';
    import CharaCard from '../organisms/CharaCard';

    export default {
        components: { 
          NavBar, 
          CharaSearch,
          CharaCard, 
          SimulateFormGroup, 
          MaterialCard, 
          StageTable, 
        },

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

        computed: {
          // search
          ...mapState('search', {
            characterSearchList: 'list',
          }),
          // chara
          ...mapState('character', {
            characterList: 'character',
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