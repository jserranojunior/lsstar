import { createApp } from "vue";
import App from "./App.vue";
import router from "./router/index.js";
import store from "./store/index.js";
import "./assets/styles/tail.css";

createApp(App).use(router).use(store).mount("#app");
