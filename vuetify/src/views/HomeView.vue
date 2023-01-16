<template>
  <v-container>
    <title-text />
  </v-container>
</template>

<script lang="ts">
import Vue from 'vue'
import TitleText from "@/components/TitleText.vue";

export default Vue.extend({
  name: 'Home',

  components: {
    TitleText,
  }
})
</script>
