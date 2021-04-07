import { goapi } from "@/http/services.js";

export const page = {
  async get(idPage) {
    let urlApi = "files/read/" + idPage;
    // let urlApi = "pages/" + this.id;
    return goapi
      .getwithouttoken(urlApi)
      .then((response) => {
        return response.data.data
          .split("VUE_APP_LARAVEL_STORAGE_URL")
          .join(process.env.VUE_APP_LARAVEL_STORAGE_URL);
      })
      .catch((err) => {
        // eslint-disable-next-line
        console.log(err.response);
      });
  },
  async write(idPage, content) {
    let urlApi = "files/writer/" + idPage;
    // let urlApi = "pages/" + this.id;
    return goapi
      .putwithouttoken(urlApi, content)
      .then((response) => {
        return response.data;
      })
      .catch((err) => {
        // eslint-disable-next-line
        console.log(err.response);
      });
  },
};
