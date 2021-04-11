import { createApp } from "vue";
import App from "./App.vue";
import router from "./router/index.js";
import store from "./store/index.js";
import "./assets/styles/tail.css";
import slifer from "slifer";

createApp(App).use(router).use(store).use(slifer).mount("#app");
