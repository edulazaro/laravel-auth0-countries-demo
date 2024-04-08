<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import Alert from '@/Components/Alert.vue';
import Country from './Components/Country.vue';
import { Head } from "@inertiajs/vue3";
import { ref, computed } from 'vue';

const { countries, error } = defineProps({
    countries: {
        type: Object,
    },
    error: {
        type:  [String, null],
        default: null,
    },
});

const searchQuery = ref('');

const filteredCountries = computed(() => {
    return Object.values(countries).filter(country => 
        country.name.toLowerCase().includes(searchQuery.value.toLowerCase())
    );
});

</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Countries
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                
                <Alert v-if="error" :message="error" />
                
                <div v-else class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                    <div class="p-8">
                        <label for="search" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Filter countries</label>
                        <input type="text" id="search" v-model="searchQuery" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Search here..." />
                    </div>

                    <div class="grid sm:grid-cols-4 md:grid-cols-6 lg:grid-cols-8 gap-8 p-6">
                        <div v-for="(country, key) in filteredCountries" :key="key">
                            <Country :name="country.name" :flag="country.flag"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
