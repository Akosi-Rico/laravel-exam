<template>
    <div style="margin:2px; border-radius: 5px; border:2px solid; padding:10px;">
        <h1>Card Sorter</h1>
        <input v-model="cards[0]" placeholder="Enter first card (e.g., HA)" />
        <input v-model="cards[1]" placeholder="Enter second card (e.g., D2)" />
        <input v-model="cards[2]" placeholder="Enter third card (e.g., S3)" />
        <button @click="sortCards">Sort Cards</button>
        <div v-if="sortedCards.length">
            <h2>Sorted Cards</h2>
            <p>{{ sortedCards.join(', ') }}</p>
        </div>
    </div>
  </template>
  <script>
  export default {
    props: [
      "data"
    ],
    data() {
      return {
        cards: ['', '', ''],
        sortedCards: []
      };
    },
    methods: {
      async sortCards() {
        let _this = this;
        axios({
              method: 'POST',
              url:_this.data.sortUrl,
              data: {
                cards: _this.cards
              }
          })
          .then(function (response) {
            _this.sortedCards = response.data.sortedCards;
          });
      }
    }
  };
  </script>
  