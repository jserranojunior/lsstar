import store from "../../store";

export default async (to, from, next) => {
  document.title = `Acolher - ${to.meta.titulo}`;

  var token = "";
  if (localStorage.getItem("token")) {
    token = localStorage.getItem("token");
  }

  if (!token || token == "undefined" || token == "null" || token == "") {
    token = false;
  }

  if (
    (to.meta.rule < 11 && to.name !== "login") ||
    (to.meta.rule == 19 && to.name !== "login")
  ) {
    try {
      await store.dispatch("ActionCheckToken");
      next();
    } catch (err) {
      next();
    }
  } else if (to.name !== "login" && !token) {
    try {
      await store.dispatch("ActionCheckToken");
      next({ path: to.path });
    } catch (err) {
      next({ name: "login" });
    }
  } else if (to.name === "login" && token) {
    await store.dispatch("ActionCheckToken");
    next({ name: "home" });
  } else if (to.name !== "login" && token) {
    await store.dispatch("ActionCheckToken");
    next();
  } else if (to.name === "login" && !token) {
    next();
  }
};
