<template>
  <div>
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
  </div>
</template>

<script>
    import { mapState, mapActions } from 'vuex';
    
    export default {
        mounted() {
        },

        methods: {
        },
        
        data: () => ({
          drawer: false,
          group: null,
        }),

        computed: {
        },

        watch: {
          group () {
            this.drawer = false
          },
        },
    }
</script>