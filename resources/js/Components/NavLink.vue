<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/inertia-vue3';

const props = defineProps(['href', 'active']);

const classes = computed(() => props.active
    ? 'inline-flex items-center px-3 py-3 border-l-4 border-purple-700 text-sm font-medium leading-5 text-white focus:outline-none focus:border-purple-700 transition duration-150 ease-in-out bg-gradient-to-r from-indigo-500'
    : 'inline-flex items-center px-3 py-3 border-l-4 border-transparent text-sm font-medium leading-5 text-slate-300 hover:text-white focus:outline-none focus:text-white transition duration-150 ease-in-out'
);
</script>

<template>
    <Link :href="href" :class="classes">
    <slot />
    </Link>
</template>
