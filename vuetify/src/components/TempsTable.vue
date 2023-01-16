<template>
  <div>
    <h1>Temperatures</h1>
    <section v-if="loading">
      <v-data-table
        item-key="name"
        class="elevation-1"
        loading
        loading-text="Loading... Please wait"
      ></v-data-table>
    </section>
    <section v-else>
      <v-simple-table dense>
        <template v-slot:default>
          <thead>
          <tr>
            <th class="text-left">
              Timestamp
            </th>
            <th class="text-left">
              Temperatures
            </th>
          </tr>
          </thead>
          <tbody>
          <tr
            v-for="temperature in temperatures"
            :key="temperature.timestamp"
          >
            <td>{{ temperature.timestamp }}</td>
            <td>{{ temperature.tmin }}/{{ temperature.tmax }}</td>
          </tr>
          </tbody>
        </template>
      </v-simple-table>
    </section>
  </div>
</template>

<script>
import Vue from "vue";
import axios from "axios";

export default Vue.extend({
  data () {
    return {
      temperatures: [],
      minutes: new Date().getMinutes(),
      loading: true,
    }
  },

  mounted() {
    axios
      .get('http://localhost:3000/api/weather-forecasts/temps')
      .then(response => (this.temperatures = response['data']))
      .catch(error => console.log(error))
      .finally(() => this.loading = false)
    ;
    console.dir(this.temperatures)
    this.updateTempsTable();
  },

  methods: {
    updateTempsTable: function () {
      let _this = this;
      setInterval(function () {
        _this.fetchData(_this);
      }, 60000);
    },
    fetchData: function (_this) {
      _this.minutes = new Date().getMinutes();
    }
  }
})
</script>
