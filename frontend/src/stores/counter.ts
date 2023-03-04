import { defineStore } from 'pinia'
import axios from "axios"

export const useUserStore = defineStore("user", {
  state: () => ({
    users: [],
  }),
  getters: {
    getUsers(state){
      return state.users
    }
  },
  actions: {
    async fetchUsers() {
      try {
        const data = await axios.get('http://localhost:8000/')
        this.users = data.data
      }
      catch (error) {
        alert(error)
        console.log(error)
      }
    }
  },
})