<template>
  <div class="weather" :key="selectedValue">
    <section v-if="errored">
      <p>Weather data error</p>
    </section>
    <section v-else>
      <div class="row">
      <div v-if="wheaterData.main && wheaterData.main.temp < 12" class="indicator blue">
        <font-awesome-icon icon="circle"/>
      </div>
      <div v-if="wheaterData.main && wheaterData.main.temp >= 12" class="indicator red">
        <font-awesome-icon icon="circle"/>
      </div>
      </div>
      <div class="row">
        <div v-if="loading">Loading...</div>
        <div v-if="wheaterData.name"><p class="text-big">{{ wheaterData.name}}</p><p>WEATHER</p></div>
        <div v-if="wheaterData.clouds && wheaterData.clouds.all < 50" class="small-indicator">
          <font-awesome-icon icon="sun"/>
        </div>
        <div v-if="wheaterData.clouds && wheaterData.clouds.all >= 50" class="small-indicator">
          <font-awesome-icon icon="cloud"/>
        </div>

        <div v-if="wheaterData.main && wheaterData.main.temp && wheaterData.weather[0].description"><p class="text-big">{{ wheaterData.main.temp }}°C</p>
        <p>{{ wheaterData.weather[0].description }}</p></div>
      </div>
    </section>
    <div>
      <select v-model="selectedValue" v-on:click="fetchData(selectedValue)">
        <option v-for="(option, name) in citiesOptions" :value="option">{{ name }}</option>
      </select>
    </div>
    <h4>Weather App 0.0.1</h4>
  </div>
</template>

<script>
  import axios from "axios";
  export default {
    name: 'Weather',
    data () {
      return {
        loading: true,
        errored: false,
        wheaterData: [],
        citiesOptions: {
          'Warsaw': 'Warsaw',
          'New York': 'New York',
          'London': 'London',
          'Berlin': 'Berlin',
          'Tokio': 'Tokio',
          'Paris': 'Paris',
          'Cairo': 'Cairo'
        },
        selectedValue: 'New York',
      }
    },
    methods: {
      fetchData: function (city) {
        axios.get(`http://localhost:8088/public/read/${city}`).then(
          response => (this.wheaterData = response.data)
        ).catch(error => {
          console.log(error)
          this.errored = true
        }).finally(() => this.loading = false)
      }
    },
    mounted() {
      this.fetchData('New York')
    }
  }
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
h1, h2 {
  font-weight: normal;
}
ul {
  list-style-type: none;
  padding: 0;
}
li {
  display: inline-block;
  margin: 0 10px;
}
a {
  color: #42b983;
}
.indicator {
  font-size: 6em;
}
.small-indicator {
  font-size: 4em;
}
.red {
  color: red;
}
.blue {
  color: blue;
}
.row {
  display: flex;
  justify-content: center;
}
.text-big {
  text-transform: uppercase;
  font-weight: bold;
  font-size: 1.2em;
}
.weather {
  display: grid;
}
</style>
