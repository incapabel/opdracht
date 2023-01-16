<template>
  <div>
    <h1>Fog%</h1>
    <section v-if="loading">
      <v-progress-linear
        indeterminate
        color="grey"
      ></v-progress-linear>
    </section>
    <section>
      <v-sparkline
        :line-width="1"
        :smooth="8"
        :value="fogChanceSimple"
        auto-draw
      ></v-sparkline>
    </section>
  </div>
</template>

<script>
import Vue from "vue";
import axios from "axios";

export default Vue.extend({
  data () {
    return {
      fogChance: [],
      loading: true,
    }
  },

  mounted() {
    axios
      .get('http://localhost:3000/api/weather-forecasts/fog')
      .then(response => (this.fogChance = response['data']))
      .catch(error => console.log(error))
      .finally(() => this.loading = false)
    ;
    console.dir(this.fogChance)
  },

  computed: {
    fogChanceSimple: function() {
      return this.fogChance.map(this.simplify);
    },
  },

  methods: {
    simplify: function(array) {
      return array['fog'];
    }
  }
})
</script>
