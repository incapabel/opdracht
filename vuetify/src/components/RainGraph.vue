<template>
  <div>
    <h1>Rain%</h1>
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
        :value="rainChanceSimple"
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
      rainChance: [],
      loading: true,
    }
  },

  mounted() {
    axios
      .get('http://localhost:3000/api/weather-forecasts/rain')
      .then(response => (this.rainChance = response['data']))
      .catch(error => console.log(error))
      .finally(() => this.loading = false)
    ;
  },

  computed: {
    rainChanceSimple: function() {
      return this.rainChance.map(this.simplify);
    },
  },

  methods: {
    simplify: function(array) {
      return array['rain'];
    }
  }
})
</script>
