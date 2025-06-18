<template>
    <AppLayout :breadcrumbs="breadcrumbs">

        <Head title="Category Create" />

        <!-- <CategoriesLayout> -->
        <div class="p-6">
            <div class="overflow-x-auto text-sm">
                <Link href="/categories/create" class="float-right text-blue-500 hover:underline mr-2">Create</Link>


                <table class="table-auto w-full border border-gray-300 text-sm">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border border-gray-300 px-4 py-2 text-left w-[10%]">ID</th>
                            <th class="border border-gray-300 px-4 py-2 text-left">Name</th>
                            <th class="border border-gray-300 px-4 py-2 text-left w-[20%]">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="category in categories" :key="category.id">
                            <td class="border border-gray-300 px-4 py-2">{{ category.id }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ category.name }}</td>
                            <td class="border border-gray-300 px-4 py-2">
                                <Link :href="`/categories/${category.id}/edit`" class="text-blue-500 hover:underline">
                                Edit
                                </Link>
                                <button @click="deleteCategory(category.id)" class="ml-2 text-red-500 hover:underline">
                                    Delete
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>


        </div>
        <!-- </CategoriesLayout> -->
    </AppLayout>

</template>

<script setup lang="ts">
import { Head, Link, router, usePage } from '@inertiajs/vue3';
import { type BreadcrumbItem } from '@/types';
import AppLayout from '@/layouts/AppLayout.vue';
import CategoriesLayout from '@/layouts/categories/Layout.vue';
import type { CategoryType } from '@/types/category';

// const { categories } = usePage().props as unknown as {
//     categories: CategoryType[];
// };

const props = defineProps<{
    categories: CategoryType[]
}>()
const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Category',
        href: '/categories',
    },
];
const deleteCategory = (id: any) => {
    if (confirm('Delete this category?')) {
        router.delete(`/categories/${id}`);
    }
};
</script>
