import '@testing-library/jest-dom';
import { render, screen } from '@testing-library/vue';
import { describe, it, expect } from 'vitest';
import BidResult from '@/components/BidResult.vue';

describe('BidResult.vue', () => {
  it('displays the total price and fees correctly', async () => {
    const data = {
      base_price: 1000,
      fees: {
        buyer_fee: 50,
        seller_fee: 20,
        association_fee: 10,
        storage_fee: 100
      },
      total: 1180
    };

    render(BidResult, {
      props: {
        data
      }
    });

    // Check that all the elements are rendered correctly
    expect(screen.getByText(/Base Price:/i)).toBeInTheDocument();
    expect(screen.getByText(/Buyer Fee:/i)).toBeInTheDocument();
    expect(screen.getByText(/Seller Fee:/i)).toBeInTheDocument();
    expect(screen.getByText(/Association Fee:/i)).toBeInTheDocument();
    expect(screen.getByText(/Storage Fee:/i)).toBeInTheDocument();
    expect(screen.getByText(/Total:/i)).toBeInTheDocument();
  });
});