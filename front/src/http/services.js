import axios from 'axios'

const axiosInstance = axios.create({
    baseURL: process.env.VUE_APP_LARAVEL_API_URL
})

export const api = {
    get(endpoint){
        return axiosInstance.get(endpoint)
    },

    post(endpoint, body){
        return axiosInstance.post(endpoint, body)
    },

    put(endpoint, body){
        return axiosInstance.put(endpoint, body)
    },
    patch(endpoint, body){
        return axiosInstance.patch(endpoint, body)
    }
}