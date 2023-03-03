<script>
export default {
  props: {
    icon: {
      type: String,
      required: true,
    },
  },
}
</script>

<template>
  <img class="w-20" :src="'/src/assets/img/weather/icons/' + icon + '.png'" alt="Icon">
</template>