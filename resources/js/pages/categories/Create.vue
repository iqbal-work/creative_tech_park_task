<template>
    <AppLayout :breadcrumbs="breadcrumbs">

        <Head title="Category Create" />
            <div class="p-6">
                <form @submit.prevent="submit">
                    <input v-model="form.name" type="text" placeholder="Name" class="border p-2 rounded w-full" />
                    <div class="text-red-500" v-if="form.errors.name">{{ form.errors.name }}</div>
                    <button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded">Save</button>
                </form>
            </div>
    </AppLayout>


</template>

<script setup lang="ts">
import { Head, Link, useForm, usePage } from '@inertiajs/vue3';
import { type BreadcrumbItem } from '@/types';
import AppLayout from '@/layouts/AppLayout.vue';

const form = useForm({ name: '' });
const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Category',
        href: '/categories',
    },
    {
        title: 'Category Create',
        href: '/categories/create',
    },
];

const submit = () => form.post('/categories');
</script>
