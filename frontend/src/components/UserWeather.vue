<script>
import WeatherIcon from "@/components/WeatherIcon.vue";

export default {
  components: {WeatherIcon},
}
</script>

<template>
  <section class="flex justify-between items-center cursor-pointer w-full px-5 pt-1 pb-4 border border-1 border-light rounded-lg hover:bg-gradient-to-r hover:from-cyan-500 hover:to-blue-500">
    <div class="flex flex-col gap-y-1">
      <h3 class="text-lighter text-sm">AbdulQudus Yunus</h3>
      <h1 class="text-4xl">Lagos</h1>
    </div>
    <div class="flex flex-col items-center justify-center">
      <WeatherIcon icon="01d"/>
      <h3 class="text-silver text-sm font-bold">Stormy</h3>
    </div>
    <div class="flex">
      <h2 class="flex text-5xl">32 <span class="pl-1 text-lighter text-2xl">°</span></h2>
    </div>
  </section>
</template>