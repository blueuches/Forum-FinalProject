<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Pagination from "@/Components/Pagination.vue";
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    communities: Object,
})
</script>

<template>
    <Head title="All Communities" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-2xl font-bold leading-tight text-gray-800">
                Your Communities
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="bg-white shadow sm:rounded-lg">
                    <!-- Add Community Button -->
                    <div class="flex justify-end items-center px-6 py-4 border-b border-gray-200">

                        <Link :href="route('communities.create')"  class="bg-[#a2cf6e] hover:bg-green-700 text-white font-bold py-2 px-4 rounded shadow-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50"> Add Community</Link>

                    </div>

                    <!-- Table -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th
                                        scope="col"
                                        class="px-6 py-3 text-left text-sm font-semibold text-gray-700 uppercase"
                                    >
                                        Name
                                    </th>
                                    <th
                                        scope="col"
                                        class="px-6 py-3 text-left text-sm font-semibold text-gray-700 uppercase"
                                    >
                                        Slug
                                    </th>
                                    <th
                                        scope="col"
                                        class="px-6 py-3 text-right text-sm font-semibold text-gray-700 uppercase"
                                    >
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr v-for="community in communities.data" :key="community.id">
                                    <td class="px-6 py-4 text-sm font-medium text-gray-900">
                                        <Link :href="route('frontend.communities.show', community.slug)" class="text-green-600 hover:text-green-800 font-semibold">
                                            {{ community.name }}
                                        </Link>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        {{ community.slug }}
                                    </td>
                                    <td class="px-6 py-4 text-right text-sm">
                                        <Link
                                            :href="route('communities.edit',community.slug)"
                                            class="text-indigo-600 hover:text-indigo-900 mr-3"
                                        >
                                            Edit
                                        </Link>
                                        <Link
                                            :href="route('communities.destroy',community.slug)"
                                            class="text-red-600 hover:text-red-900"
                                            method="delete"
                                            as="button"
                                            type="button"
                                        >
                                            Delete
                                        </Link>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="m-2 p-2">
                            <Pagination :links="communities.links" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
