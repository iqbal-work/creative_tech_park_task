<script setup lang="ts">
import { Head, useForm } from '@inertiajs/vue3'
import { type BreadcrumbItem } from '@/types';
import { type CategoryType } from '@/types/category'
import { type ProductType } from '@/types/product';
import AppLayout from '@/layouts/AppLayout.vue';


const props = defineProps<{
    product: ProductType;
    categories: CategoryType[];
}>()
const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Product',
        href: '/products',
    },
    {
        title: 'Product Edit',
        href: '',
    },
];
const form = useForm({
    name: props.product.name,
    categories: props.product.categories.map(c => c.id)
})

const submit = () => {
    form.put(`/products/${props.product.id}`)
}
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">

        <Head title="Category Create" />
        <div class="p-6">
            <h1 class="text-xl font-bold mb-4">Create Product</h1>
            <form @submit.prevent="submit" class="space-y-4">
                <div>
                    <label class="block font-medium">Name</label>
                    <input v-model="form.name" class="border px-4 py-2 w-full rounded" type="text" />
                    <p class="text-red-500 text-sm" v-if="form.errors.name">{{ form.errors.name }}</p>
                </div>

                <div>
                    <label class="block font-medium mb-2">Select Categories</label>
                    <div class="flex flex-wrap gap-2">
                        <label v-for="category in props.categories" :key="category.id" class="inline-flex items-center">
                            <input type="checkbox" :value="category.id" v-model="form.categories" class="mr-2" />
                            {{ category.name }}
                        </label>
                    </div>
                    <p class="text-red-500 text-sm" v-if="form.errors.categories">{{ form.errors.categories }}</p>
                </div>
                <button class="mt-4 bg-green-500 text-white px-4 py-2 rounded" :disabled="form.processing">Update</button>
                
            </form>
        </div>
    </AppLayout>

</template>
