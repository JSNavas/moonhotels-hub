import { createApp } from "vue";
import router from "./router";
import { createPinia } from "pinia";
import App from "./App.vue";
import "./index.css";

const app = createApp(App);
app.use(createPinia());
app.use(router).mount("#app");
