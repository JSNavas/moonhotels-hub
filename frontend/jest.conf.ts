module.exports = {
  preset: "ts-jest", // Solo si usas TypeScript
  testEnvironment: "jsdom",
  transform: {
    "^.+\\.vue$": "vue-jest", // Procesa archivos .vue
    "^.+\\.js$": "babel-jest", // Procesa archivos .js
    "^.+\\.ts$": "ts-jest", // Solo si usas TypeScript
  },
  moduleFileExtensions: ["js", "ts", "json", "vue"],
  moduleNameMapper: {
    "^@/(.*)$": "<rootDir>/src/$1", // Alias de Vue
    "\\.(css|scss)$": "jest-transform-stub", // Para archivos CSS y SCSS
  },
  transformIgnorePatterns: ["/node_modules/"],
};
