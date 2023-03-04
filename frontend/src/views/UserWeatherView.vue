<script lang="ts">
import WeatherIcon from "@/components/WeatherIcon.vue";
import {computed, defineComponent, onMounted} from "vue";
import router from "@/router";
import {useRoute} from "vue-router";
import {useUserStore} from "@/stores/user";
import type {User} from "@/stores/user";

export default defineComponent({
  components: {WeatherIcon},

  setup(){
    const goBackHome = () => {
      router.push({name: "Home"})
    }
    const route = useRoute();
    const store = useUserStore();

    onMounted(() => {
      const userId : string = route.params.id as string
      store.fetchUser(userId);
    })

    const user = computed<User>(() => {
      return store.user as User;
    });

    return {
      user,
      goBackHome,
    }
  }
})
</script>

<template>
  <div v-if="Object.keys(user).length > 0" class="fixed top-0 left-0 right-0 border border-1 border-light  z-50 w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 md:h-full justify-center items-center flex" >
    <div class="relative w-full h-full max-w-lg md:h-auto">
      <div class="relative bg-grey rounded-3xl shadow bg-grey border border-3 border-white ">
        <div class="flex items-start justify-between p-4 rounded-t">
          <button @click="goBackHome" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
          </button>
        </div>
        <div class="flex flex-col items-center  text-white text-center justify-center w-full pb-10 px-10">

          <div class="text-center mb-5">
            <h3 class="text-lighter text-sm">{{ user.name }}</h3>
            <h1 class="text-3xl uppercase">{{ user.weather.city }}</h1>
          </div>

          <WeatherIcon class="w-32 mb-2" :icon="user.weather.icon"/>

          <div class="flex flex-col gap-y-3 mb-10">
            <h5><span class="bg-silver text-grey text-sm rounded-lg py-1 px-2 py-1.5">{{ user.weather.main }}</span></h5>
            <h6 class="text-lighter  text-xs capitalize">{{ user.weather.description }}</h6>
          </div>

          <h2 class="flex text-7xl font-bold mb-7">{{ user.weather.temperature }} <span class="px-1 text-lighter text-2xl">° </span> C</h2>

          <div class="flex flex-col w-full gap-y-3 mt-10">
            <div class="flex justify-between items-center">
              <h4>Feels Like</h4>
              <h5 class="text-lighter">{{ user.weather.feels_like }}</h5>
            </div>
            <div class="flex justify-between items-center">
              <h4>Humidity</h4>
              <h5 class="text-lighter">{{ user.weather.humidity }}</h5>
            </div>
            <div class="flex justify-between items-center">
              <h4>Wind speed</h4>
              <h5 class="text-lighter">{{ user.weather.wind_speed }}</h5>
            </div>
            <div class="flex justify-between items-center">
              <h4>Wind degree</h4>
              <h5 class="text-lighter">{{ user.weather.wind_degree }}</h5>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
