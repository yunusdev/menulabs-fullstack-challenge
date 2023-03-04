<script lang="ts">
import { computed, defineComponent, watch, onMounted, ref } from "vue";
import UserWeather from "@/components/UserWeather.vue";
import { useUserStore } from "@/stores/user";
import Pagination from "@/components/Pagination.vue";
export default defineComponent({
  components: {Pagination, UserWeather},
  setup(){
    const store = useUserStore();
    onMounted(() => {
      store.fetchUsers();
    });

    const users = computed(() => {
      return store.users;
    });

    const pagination = computed(() => {
      return store.pagination;
    });

    const update_pagination = (page: number) => {
      console.log({page})
      store.fetchUsers(page);
    }

    return {
      users,
      pagination,
      update_pagination,
    }
  }
})
</script>

<template>
  <main v-if="pagination && users.length > 0" class="flex flex-col text-silver justify-center items-center gap-y-4 max-w-3xl w-full  mt-20 ">
    <UserWeather :user="user" v-for="user, key in users" :key="key"/>
    <Pagination :pagination="pagination" @paginate="update_pagination"/>
  </main>
</template>