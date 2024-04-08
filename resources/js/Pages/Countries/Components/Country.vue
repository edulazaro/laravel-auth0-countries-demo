<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    name: {
        type: String,
        required: true,
    },
    flag: {
        type: String,
        required: true,
    },
});
</script>

<template>
    <div class="text-center">
        <img :src="flag" class="mx-auto max-h-14 shadow-md"/>
        <h3 class="font-semibold text-lg text-gray-900 mt-3.5">{{ name }}</h3>
    </div>
</template>
