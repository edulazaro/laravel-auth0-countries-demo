<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    message: {
        type: String,
        required: true,
    },
});
</script>

<template>
    <div class="p-6 m-6 mb-4 text-sm text-red-800 rounded-lg  border border-red-300 bg-red-50" role="alert">
        <span class="font-medium">Ups!</span> {{message}}
    </div>
</template>
