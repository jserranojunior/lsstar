import axios from "axios";

var axiosImage = axios.create({
  baseURL: process.env.VUE_APP_LARAVEL_API_URL,
  headers: {
    Accept: "application/json",
    "Content-Type": "multipart/form-data",
  },
});

var axiosSemToken = axios.create({
  baseURL: process.env.VUE_APP_LARAVEL_API_URL,
});

export const goapi = {
  getwithouttoken(endpoint) {
    let axiosInstance = axios.create({
      baseURL: process.env.VUE_APP_GO_API_URL,
      headers: {
        "Content-Type": "application/json",
      },
    });
    return axiosInstance.get(endpoint);
  },
  putwithouttoken(endpoint, body) {
    let axiosInstance = axios.create({
      baseURL: process.env.VUE_APP_GO_API_URL,
      headers: {
        "Content-Type": "application/json",
      },
    });
    return axiosInstance.put(endpoint, body);
  },
};

export const api = {
  get(endpoint) {
    var token = localStorage.getItem("token");
    var axiosInstance = axios.create({
      baseURL: process.env.VUE_APP_LARAVEL_API_URL,
      headers: {
        Authorization: "Bearer " + token,
        "Content-Type": "application/json",
      },
    });
    return axiosInstance.get(endpoint);
  },

  post(endpoint, body) {
    var token = localStorage.getItem("token");
    var axiosInstance = axios.create({
      baseURL: process.env.VUE_APP_LARAVEL_API_URL,
      headers: {
        Authorization: "Bearer " + token,
        "Content-Type": "application/json",
      },
    });
    return axiosInstance.post(endpoint, body);
  },

  postimage(endpoint, body) {
    return axiosImage.post(endpoint, body);
  },

  postpassandotoken(endpoint, body, token) {
    return axiosSemToken.post(endpoint, body, {
      headers: { Authorization: "Bearer " + token },
    });
  },

  getsemtoken(endpoint) {
    return axiosSemToken.get(endpoint);
  },

  postsemtoken(endpoint, body) {
    return axiosSemToken.post(endpoint, body);
  },

  putsemtoken(endpoint, body) {
    return axiosSemToken.put(endpoint, body);
  },

  put(endpoint, body) {
    var token = localStorage.getItem("token");
    var axiosInstance = axios.create({
      baseURL: process.env.VUE_APP_LARAVEL_API_URL,
      headers: {
        Authorization: "Bearer " + token,
        "Content-Type": "application/json",
      },
    });
    return axiosInstance.put(endpoint, body);
  },
  patch(endpoint, body) {
    var token = localStorage.getItem("token");
    var axiosInstance = axios.create({
      baseURL: process.env.VUE_APP_LARAVEL_API_URL,
      headers: {
        Authorization: "Bearer " + token,
        "Content-Type": "application/json",
      },
    });
    return axiosInstance.patch(endpoint, body);
  },

  delete(endpoint) {
    var token = localStorage.getItem("token");
    var axiosInstance = axios.create({
      baseURL: process.env.VUE_APP_LARAVEL_API_URL,
      headers: {
        Authorization: "Bearer " + token,
        "Content-Type": "application/json",
      },
    });
    return axiosInstance.delete(endpoint);
  },
};
