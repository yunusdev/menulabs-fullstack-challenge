<script lang="ts">
import {defineComponent, ref, watch} from "vue";

export default defineComponent({
  props: {
    pagination: {
      type: Object,
      required: true,
    },
  },

  setup(props, {emit}){

    const pagination = props.pagination

    const from_page = ref(((pagination.current_page - 1) * pagination.per_page) + 1);
    const to_page = ref(from_page.value + pagination.per_page - 1);
    const current_page = ref(pagination.current_page);

    watch(() => props.pagination, (current, second) => {
      from_page.value = ((current.current_page - 1) * current.per_page) + 1;
      to_page.value = from_page.value + current.per_page - 1;
      current_page.value = current.current_page;
    });

    const prev = () => {
      const page = current_page.value - 1
      if (page <= 0) return
      emit("paginate", page);
    };

    const next = () => {
      const page = current_page.value + 1
      if (page > pagination.total_pages) return
      emit("paginate", page);
    };


    return {
      from_page,
      current_page,
      to_page,
      prev,
      next,
    }
  }
})
</script>

<template>
  <div class="flex flex-col items-center">
    <span class="text-sm text-gray-700 dark:text-gray-400">
      Showing <span class="font-semibold text-gray-900 dark:text-white">{{from_page}}</span> to <span class="font-semibold text-gray-900 dark:text-white">{{ to_page }}</span> of <span class="font-semibold text-gray-900 dark:text-white">{{ pagination.total }}</span> Entries
    </span>
    <div class="inline-flex mt-2 xs:mt-0">
      <button :disabled="current_page === 1" @click="prev" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-gray-800 rounded-l hover:bg-gray-900 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white disabled:cursor-not-allowed">
        <svg aria-hidden="true" class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd"></path></svg>
        Prev
      </button>
      <button :disabled="current_page === pagination.total_pages" @click="next" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-gray-800 border-0 border-l border-gray-700 rounded-r hover:bg-gray-900 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white disabled:cursor-not-allowed">
        Next
        <svg aria-hidden="true" class="w-5 h-5 ml-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
      </button>
    </div>
  </div>
</template>