<template>
    <div class="mt-4 border-t pt-4">
      <h2 class="text-lg font-semibold mb-2">Result</h2>
      <ul class="text-sm space-y-1">
        <li><strong>Base Price:</strong> ${{ data.base_price.toFixed(2) }}</li>
        <li><strong>Buyer Fee:</strong> ${{ data.fees.buyer_fee.toFixed(2) }}</li>
        <li><strong>Seller Fee:</strong> ${{ data.fees.seller_fee.toFixed(2) }}</li>
        <li><strong>Association Fee:</strong> ${{ data.fees.association_fee.toFixed(2) }}</li>
        <li><strong>Storage Fee:</strong> ${{ data.fees.storage_fee.toFixed(2) }}</li>
        <li class="font-bold text-green-600"><strong>Total:</strong> ${{ data.total.toFixed(2) }}</li>
      </ul>
    </div>
  </template>
  
  <script setup>
  defineProps({
    data: Object
  })
  </script>

<style scoped>

.errors {
  margin-top: 1rem;
  color: red;
}
</style>