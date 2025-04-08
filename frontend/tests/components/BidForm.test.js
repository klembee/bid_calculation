import { mount } from '@vue/test-utils'
import BidForm from '@/components/BidForm.vue'
import { vi, expect, it, describe } from 'vitest'
import axios from 'axios'

// Mock axios to prevent actual API calls during tests
vi.mock('axios')

describe('BidForm.vue', () => {
  it('renders form inputs correctly', () => {
    const wrapper = mount(BidForm)
    
    // Check if the price input and vehicle type dropdown are rendered
    expect(wrapper.find('input[type="number"]').exists()).toBe(true)
    expect(wrapper.find('select').exists()).toBe(true)
  })

  it('submits form and emits the correct result', async () => {
    // Mock response from axios
    axios.post.mockResolvedValue({ data: { total: 1180 } })
    
    const wrapper = mount(BidForm)
    
    // Set form inputs
    await wrapper.find('input[type="number"]').setValue(1000)
    await wrapper.find('select').setValue('common')

    // Trigger form submission
    await wrapper.find('form').trigger('submit.prevent')
    
    // Wait for the emitted event
    await wrapper.vm.$nextTick()
    
    // Assert the emitted event
    expect(wrapper.emitted('calculated')).toBeTruthy()
    expect(wrapper.emitted('calculated')[0][0]).toEqual({ total: 1180 })
    
    // Check if axios.post was called with the correct payload
    expect(axios.post).toHaveBeenCalledWith('http://localhost:8000/get_vehicle_total_price', {
      price: 1000,
      type: 'common'
    })
  })
})