import { defineStore } from 'pinia'
import axios from "axios"

export const useUserStore = defineStore("user", {
  state: () => ({
    users: [],
    pagination: null
  }),
  getters: {
    getUsers(state){
      return state.users
    },
    getPagination(state){
      return state.pagination
    }
  },
  actions: {
    async fetchUsers(page = 1) {
      try {
        const data = await axios.get('http://localhost:8000/', {
          params: {page}
        })
        this.users = data.data.users.rows
        this.pagination = data.data.users.pagination
      }
      catch (error) {
        alert(error)
        console.log(error)
      }
    }
  },
})