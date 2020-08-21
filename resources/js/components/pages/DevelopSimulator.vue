<template>
  <div>
    <v-app-bar
      color="deep-purple accent-4"
      dense
      dark
    >
      <v-app-bar-nav-icon></v-app-bar-nav-icon>

      <v-toolbar-title>Page title</v-toolbar-title>

      <v-spacer></v-spacer>
      
    </v-app-bar>
  </div>
</template>

<script>
    import { mapActions } from 'vuex';
    
    export default {
        mounted() {
            console.log(this.$store);
        }
    }
</script>
