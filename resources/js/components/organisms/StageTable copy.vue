<template>
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
          <td>{{ stage.stamina }}</td>
        </tr>
      </tbody>
    </template>
  </v-simple-table>
</template>

<script>
    export default {
      props: {
        stages: {},
      },
    }
</script>