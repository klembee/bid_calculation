import { defineConfig } from 'vitest/config'
import vue from '@vitejs/plugin-vue'
import path from 'path'  // Import the 'path' module

export default defineConfig({
  plugins: [vue()],
  test: {
    environment: 'jsdom',  // Use jsdom environment for testing
    globals: true,  // Allow global variables like `describe`, `it`, etc.
    include: ['**/tests/**/*.test.js'],  // Where to find your test files
    alias: {
      '@': path.resolve(__dirname, 'src') // Alias `@` to point to the `src` folder
    },
  }
})