<script setup lang="ts">
import { Head, router, Link } from '@inertiajs/vue3'
import type { BreadcrumbItem } from '@/types';
import AppLayout from '@/layouts/AppLayout.vue';
import type { Product } from '@/types/product'

const props = defineProps<{
    products: Product[]
}>()
const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Product',
        href: '/products',
    },
];
const deleteProduct = (id: number) => {
    if (confirm('Are you sure you want to delete this product?')) {
        router.delete(`/products/${id}`)
    }
}
</script>
<template>
    <AppLayout :breadcrumbs="breadcrumbs">
        <Head title="Category Create" />
        <div class="p-6">
            <div class="overflow-x-auto text-sm">
                <Link href="/products/create" class="float-right text-blue-500 hover:underline mr-2">Create</Link>
                <table class="table-auto w-full border border-gray-300 text-sm">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border px-4 py-2 text-left">ID</th>
                            <th class="border px-4 py-2 text-left">Name</th>
                            <th class="border px-4 py-2 text-left">Categories</th>
                            <th class="border px-4 py-2 text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="product in props.products" :key="product.id" class="hover:bg-gray-50">
                            <td class="border px-4 py-2">{{ product.id }}</td>
                            <td class="border px-4 py-2 font-medium">{{ product.name }}</td>
                            <td class="border px-4 py-2">
                                <span v-for="cat in product.categories" :key="cat.id"
                                    class="inline-block bg-gray-200 text-gray-800 px-2 py-1 rounded text-xs mr-1 mb-1">
                                    {{ cat.name }}
                                </span>
                            </td>
                            <td class="border px-4 py-2 space-x-2 whitespace-nowrap">
                                <Link :href="`/products/${product.id}/edit`" class="text-blue-500 hover:underline">
                                Edit
                                </Link>
                                <button @click="deleteProduct(product.id)" class="text-red-500 hover:underline">
                                    Delete
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AppLayout>

</template>
