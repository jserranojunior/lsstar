import axios from "axios";
export const cep = {
  get(endpoint) {
    var cep = endpoint.replace("-", "");
    var url = "https://viacep.com.br/ws/" + cep + "/json/";
    return axios
      .get(url)
      .then(function(response) {
        return response.data;
      })
      .catch((err) => {
        return err.response;
      });
  },
};
