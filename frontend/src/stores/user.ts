import { defineStore } from 'pinia'
import axios from "axios"

const BASE_API_URL = 'http://localhost:8000'

interface Weather {
  city:	string
  temperature: string
  pressure:	string
  icon: string
  main: string
  description: string
}

export interface User {
  id: number,
  name: string,
  weather: Weather
}

export const useUserStore = defineStore("user", {
  state: () => ({
    users: [],
    user: {},
    pagination: null,
  }),
  getters: {
    getUsers(state): User[]{
      return state.users
    },
    getUser(state): User|object{
      return state.user
    },
    getPagination(state){
      return state.pagination
    }
  },
  actions: {
    async fetchUsers(page = 1) {
      try {
        const data = await axios.get(BASE_API_URL, {
          params: {page}
        })
        this.users = data.data.users.rows
        this.pagination = data.data.users.pagination
      }
      catch (error) {
        alert(error)
        console.log(error)
      }
    },
    async fetchUser(userId: string) {
      try {
        const data = await axios.get(`${BASE_API_URL}/user/${userId}`)
        this.user = data.data.user
      }
      catch (error) {
        alert(error)
        console.log(error)
      }
    }
  },
})