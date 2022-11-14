<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/inertia-vue3';
import { ArrowLeftCircleIcon } from '@heroicons/vue/24/solid'
import { PlusSmallIcon } from '@heroicons/vue/24/solid'
import ButtonLink from '@/Components/ButtonLink.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import axios from 'axios';

const props = defineProps({
    course: Object,
})

console.log(props.course)

const form = useForm({
    code: props.course.code ?? '',
    name: props.course.name ?? '',
    target_enrolee: props.course.target_enrolee ?? 0,
    tp_code: props.course.tp_code ?? '',
    status: props.course.status ?? 1
})

</script>

<template>
    <Head title="Create Course" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <span v-if="!props.course">
                    Create Course
                </span> 
                <span v-else>
                    Update Course
                </span>
            </h2>
        </template>

        <div class="pt-8">
            <div class="mx-auto sm:px-6 lg:px-8">
                <ButtonLink :getRoute="'course.index'">
                    <ArrowLeftCircleIcon  class="h-5 w-5 mr-1" /> Back
                </ButtonLink>
            </div>
        </div>

        <div class="py-5">
            <div class="mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form @submit.prevent="props.course ? form.put(route('course.update', props.course.id)) : form.post(route('course.store'))" class="px-4 mx-auto space-y-3">
                            <div>
                                <InputLabel for="code" value="Code" />
                                <TextInput id="code" type="text" class="mt-1 block w-full" v-model="form.code" autofocus />
                                <InputError class="mt-1" :message="form.errors.code" />
                            </div>
                            <div>
                                <InputLabel for="name" value="Name" />
                                <TextInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" autofocus />
                                <InputError class="mt-1" :message="form.errors.name" />
                            </div>
                            <div>
                                <InputLabel for="tp_code" value="TP Code" />
                                <TextInput id="tp_code" type="text" class="mt-1 block w-full" v-model="form.tp_code" autofocus />
                                <InputError class="mt-1" :message="form.errors.tp_code" />
                            </div>
                            <div>
                                <InputLabel for="target_enrolee" value="Target Enrolees" />
                                <TextInput id="target_enrolee" type="number" class="mt-1 block w-full" v-model="form.target_enrolee" autofocus />
                                <InputError class="mt-1" :message="form.errors.target_enrolee" />
                            </div>
                            <div>
                                <InputLabel for="status" value="Status" />
                                <select v-model="form.status" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                    <option value="1">Active</option>
                                    <option value="2">Inactive</option>
                                </select>
                                <InputError class="mt-1" :message="form.errors.status" />
                            </div>

                            <div class="flex justify-end mt-4">
                                <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                    <PlusSmallIcon class="h-5 w-5 mr-1" />
                                    <span v-if="!props.course">Create</span>
                                    <span v-else>Update</span>
                                </PrimaryButton>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
