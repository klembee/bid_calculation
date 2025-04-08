<template>
    <form @submit.prevent="submit">
      <input
        class="block w-full p-2 mb-2 border"
        v-model.number="price"
        type="number"
        placeholder="Enter vehicle price"
        required
        step="0.01"
      />
      <select class="block w-full p-2 mb-2 border" v-model="type">
        <option value="common">Common</option>
        <option value="luxury">Luxury</option>
      </select>
      <button class="px-4 py-2 bg-blue-500 text-white rounded" type="submit">Calculate</button>
    </form>
  </template>
  
  <script setup>
    import axios from 'axios';
    import { ref } from 'vue'
  
  const emit = defineEmits(['calculated'])
  
  const price = ref(0)
  const type = ref('common')
  
  async function submit() {
    const res = await axios.post('http://localhost:8000/get_vehicle_total_price', {
        price: price.value, 
        type: type.value 
    });
  
    emit('calculated', res.data)
  }
  </script>

<style scoped>

form {
  display: flex;
  flex-direction: column;
  gap: 1rem;
}

</style>