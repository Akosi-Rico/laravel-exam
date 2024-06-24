<template>
    <div style="margin:2px; border-radius: 5px; border:2px solid; padding:10px;">
      <h1>Number Game</h1>
      <p>Select 8 unique numbers between 1 and 80:</p>
      <div>
        <input v-for="n in 8" :key="n" v-model="pickedNumbers[n-1]" type="number" min="1" max="80" @input="validateNumbers" />
      </div>
      <button @click="submitNumbers">Submit Numbers</button>
      <div v-if="results.length">
        <h2>Results</h2>
        <p>Drawn Numbers: {{ results.join(', ') }}</p>
        <p>Hits: {{ hits }}</p>
        <p>Prize: {{ prize }}</p>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    props:[
        "data"
    ],
    data() {
      return {
        pickedNumbers: Array(8).fill(''),
        results: [],
        hits: 0,
        prize: 0,
      };
    },
    methods: {
      validateNumbers() {
        const uniqueNumbers = new Set(this.pickedNumbers.filter(n => n));
        if (uniqueNumbers.size !== this.pickedNumbers.filter(n => n).length) {
          alert("All numbers must be unique.");
          return;
        }
      },
      async submitNumbers() {
        let _this = this;
        axios({
              method: 'POST',
              url:_this.data.drawUrl,
              data: {
                numbers: _this.pickedNumbers
              }
          })
          .then(function (response) {
            _this.results = response.data.results;
            _this.hits = response.data.hits;
            _this.prize = response.data.prize;
          });
      }
    }
  };
  </script>
  