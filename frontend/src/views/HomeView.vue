<script setup lang="ts">
import UserWeathers from "@/components/UserWeathers.vue";

</script>

<template>
  <UserWeathers/>

  <div class="absolute">
    <router-view />
  </div>
</template>
