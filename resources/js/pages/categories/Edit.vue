<template>
    <AppLayout :breadcrumbs="breadcrumbs">
        <Head title="Category Create" />
        <div class="p-6">
            <form @submit.prevent="submit">
                <input v-model="form.name" type="text" class="border p-2 rounded w-full" />
                <div class="text-red-500" v-if="form.errors.name">{{ form.errors.name }}</div>
                <button class="mt-4 bg-green-500 text-white px-4 py-2 rounded">Update</button>
            </form>
        </div>
    </AppLayout>

</template>

<script setup lang="ts" >
import { Head, Link, useForm, usePage } from '@inertiajs/vue3';
import { type BreadcrumbItem } from '@/types';
import type { CategoryType } from '@/types/category';
import AppLayout from '@/layouts/AppLayout.vue';
const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Category',
        href: '/categories',
    },
    {
        title: 'Category Edit',
        href: '',
    },
];
const props = defineProps<{
  category: CategoryType
}>()

const form = useForm({
    name: props.category.name
});


const submit = () => {
    form.put(`/categories/${props.category.id}`);
};
</script>
