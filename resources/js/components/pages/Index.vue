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

    <v-card
      max-width="1000"
      class="mx-auto"
    >
      <v-container>
        <v-row dense>
          <v-col
            v-for="(item, i) in items"
            :key="i"
            cols="12"
          >
            <v-card
              :color="item.color"
              :href="item.href"
              dark
            >
              <div class="d-flex flex-no-wrap justify-space-between">
                <div>
                  <v-card-title
                    class="headline"
                    v-text="item.title"
                  ></v-card-title>

                  <v-card-subtitle v-text="item.artist"></v-card-subtitle>
                </div>

                <v-avatar
                  class="ma-3"
                  size="125"
                  tile
                >
                  <v-img :src="item.src"></v-img>
                </v-avatar>
              </div>
            </v-card>
          </v-col>
        </v-row>
      </v-container>
    </v-card>
  </v-app>
</template>

<script>
    import { mapActions } from 'vuex';
    
    export default {
      data: () => ({
        drawer: false,
        group: null,  
        items: [
          {
            color: '#1F7087',
            src: 'https://cdn.vuetifyjs.com/images/cards/foster.jpg',
            href: 'https://cdn.vuetifyjs.com/images/cards/foster.jpg',
            title: 'Open Simulator',
            description: 'Foster the People',
          },
          {
            color: '#952175',
            src: 'https://cdn.vuetifyjs.com/images/cards/halcyon.png',
            href: './simulator',
            title: 'Dev Simulator',
            description: 'Foster the People',
          },
        ],
      }),
    }
</script>