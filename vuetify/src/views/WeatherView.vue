<template>
  <v-container>
    <v-row>
      <v-col>
        <temps-table/>
      </v-col>
      <v-col>
        <rain-graph/>
        <fog-graph/>
      </v-col>
    </v-row>
  </v-container>
</template>

<script lang="ts">
import Vue from 'vue'
import TempsTable from "@/components/TempsTable.vue";
import RainGraph from "@/components/RainGraph.vue";
import FogGraph from "@/components/FogGraph.vue";

export default Vue.extend({
  name: 'Home',

  components: {
    TempsTable,
    RainGraph,
    FogGraph,
  }
})
</script>
