<template>
  <v-app id="inspire">
    <NavBar />

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

    import NavBar from '../organisms/NavBar'

    export default {
      components: { NavBar },

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