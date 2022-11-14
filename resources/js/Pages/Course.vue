<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import ButtonLink from '@/Components/ButtonLink.vue';
import { TrashIcon } from '@heroicons/vue/24/solid'
import { PencilIcon } from '@heroicons/vue/24/solid'
import { PlusSmallIcon } from '@heroicons/vue/24/solid'
import { Link } from '@inertiajs/inertia-vue3';
import { Inertia } from '@inertiajs/inertia';


defineProps({
    courses: Object,
})

const createCourse = () => {
    window.location.href = 'create'
}

const confirmDelete = (id) => {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            Inertia.delete(route('course.delete', id))

        }
    })
}

</script>

<template>
    <Head title="Course" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Course
            </h2>
        </template>

        <div class="pt-8">
            <div class="mx-auto sm:px-6 lg:px-8">
                <ButtonLink :getRoute="'course.create'">
                    <PlusSmallIcon  class="h-5 w-5" /> Add Course
                </ButtonLink>
            </div>
        </div>

        <div class="py-5">
            <div class="mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="rounded-lg shadow overflow-auto">
                            <table class="w-full">
                                <thead class="bg-gray-50 border-b-2 border-gray-200">
                                    <tr>
                                        <th class="w-60 p-3 text-sm font-semibold tracking-wide text-left">Course</th>
                                        <th class="w-10 p-3 text-sm font-semibold tracking-wide text-left">TP Code</th>
                                        <th class="w-10 p-3 text-sm font-semibold tracking-wide text-left">Target Enrolees</th>
                                        <th class="w-10 p-3 text-sm font-semibold tracking-wide text-left">Status</th>
                                        <th class="w-10 p-3 text-sm font-semibold tracking-wide text-left">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100">
                                    <tr v-for="(course, index) in courses" :key="index" :class="[index % 2 ? 'bg-gray-50' : 'bg-white']">
                                        <td class="p-3 whitespace-nowrap text-sm text-gray-700">
                                            {{course.title}}
                                        </td>
                                        <td class="p-3 whitespace-nowrap text-sm text-gray-700">
                                            {{course.tp_code}}
                                        </td>
                                        <td class="p-3 whitespace-nowrap text-sm text-gray-700">
                                            {{course.target_enrolee}}
                                        </td>
                                        <td class="p-3 whitespace-nowrap text-sm text-gray-700">
                                            <span v-if="course.status == 1" class="p-1.5 text-xs font-medium uppercase tracking-wide text-green-800 bg-green-200 rounded-lg bg-opacity-50">
                                                Active
                                            </span>
                                            <span v-if="course.status == 2" class="p-1.5 text-xs font-medium uppercase tracking-wide text-yellow-800 bg-yellow-200 rounded-lg bg-opacity-50">
                                                Inactive
                                            </span>
                                        </td>
                                        <td class="p-3 whitespace-nowrap text-sm text-center text-gray-700 text-center">
                                            <div class="flex">
                                                <a class="mr-2" :href="route('course.edit', course.id)" rel="noopener noreferrer">
                                                    <PencilIcon class="h-4 w-4 text-gray-600"/>
                                                </a>
                                                <a href="#" @click="confirmDelete(course.id)" rel="noopener noreferrer">
                                                    <TrashIcon class="h-4 w-4 text-gray-600"/>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
