<template>
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
</template>

<script>
    import { mapState, mapActions } from 'vuex';
    
    export default {
      props: {
        promotion: {},
        skill: {},
      },

      data: () => ({
        valid: false,
      }),
    }
</script>