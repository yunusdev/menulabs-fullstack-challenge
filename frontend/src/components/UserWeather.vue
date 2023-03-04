<script lang="ts">
import WeatherIcon from "@/components/WeatherIcon.vue";
import {defineComponent} from "vue";
import router from "@/router";
import type {User} from "@/stores/user";

export default defineComponent({
  components: {WeatherIcon},
  props: {
    user: {
      type: Object as () => User,
      required: true,
    }
  },

  setup({user}){

    const openUserWeather = (userId: number) => {
      router.push({name: "UserWeatherView", params: {id: userId}})
    }

    return {
      openUserWeather
    }

  }
})
</script>

<template>
  <section @click="openUserWeather(user.id)" class="flex items-center cursor-pointer w-full px-5 pt-1 pb-4 border border-1 border-light rounded-lg hover:bg-gradient-to-r hover:from-cyan-500 hover:to-blue-500">
    <div class="flex flex-col gap-y-1 w-1/2">
      <h3 class="text-lighter text-sm">{{user.name}}</h3>
      <h1 class="text-4xl">{{user.weather.city}}</h1>
    </div>
    <div class="flex justify-between items-center w-1/2">
      <div class="flex flex-col items-center justify-center">
        <WeatherIcon :icon="user.weather.icon"/>
        <h3 class="text-silver text-sm font-bold">{{ user.weather.main }}</h3>
        <h6 class="text-lighter text-xs capitalize">{{ user.weather.description }}</h6>
      </div>
      <div class="flex">
        <h2 class="flex text-5xl">{{ user.weather.temperature }} <span class="pl-1 text-lighter text-2xl">°</span></h2>
      </div>
    </div>
  </section>
</template>