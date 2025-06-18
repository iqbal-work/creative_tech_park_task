<script setup lang="ts">
import { Head, Link, useForm, usePage } from '@inertiajs/vue3';
import { type BreadcrumbItem } from '@/types';
import AppLayout from '@/layouts/AppLayout.vue';
import type { CategoryType } from '@/types/category'

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Product',
        href: '/products',
    },
    {
        title: 'Product Create',
        href: '/categories/create',
    },
];


interface Props {
    categories: CategoryType[];
}

 const props=defineProps<Props>();
const form = useForm({
    name: '',
    categories: [] as number[]
})

const toggleCategory = (id: number) => {
    if (form.categories.includes(id)) {
        form.categories = form.categories.filter(catId => catId !== id)
    } else {
        form.categories.push(id)
    }
}

const submit = () => {
    form.post('/products')
}
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">

        <Head title="Category Create" />
        <div class="p-6">
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

                <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700" :disabled="form.processing">
                    Save Product
                </button>
            </form>
        </div>
    </AppLayout>

</template>
