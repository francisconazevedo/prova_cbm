import axios from 'axios';

/* API GET to receive CEP's data from Database */
const api = axios.create({baseURL: 'http://localhost:9004/Addresses'})

export default api;