import { defineConfig } from "vite";
import path from "path";

export default defineConfig({
  build: {
    rollupOptions: {
      input: path.resolve(__dirname, "assets/js/main.js"),
      output: {
        entryFileNames: "js.js",
        assetFileNames: "style.css",
      },
    },
    outDir: "dist",
    emptyOutDir: true,
  },
  css: {
    postcss: "./postcss.config.js",
  },
});
