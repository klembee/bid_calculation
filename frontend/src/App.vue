<template>
  <div class="p-4 max-w-md mx-auto">
    <h1 class="text-xl font-bold mb-4">Bid Calculation Tool</h1>
    <BidForm @calculated="handleCalculation" />
    <BidResult v-if="result" :data="result" />
  </div>
</template>

<script setup>
import { ref } from 'vue'
import BidForm from './components/BidForm.vue'
import BidResult from './components/BidResult.vue'

const result = ref(null)

function handleCalculation(data) {
  result.value = data
}
</script>

<style scoped>
  .app {
    max-width: 500px;
    margin: 2rem auto;
    font-family: sans-serif;
  }
</style>