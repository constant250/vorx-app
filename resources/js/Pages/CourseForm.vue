<script setup>
import { ref } from 'vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/inertia-vue3';
// import { ArrowLeftCircleIcon } from '@heroicons/vue/24/solid'
// import { PlusSmallIcon } from '@heroicons/vue/24/solid'
// import ButtonLink from '@/Components/ButtonLink.vue';
// import InputError from '@/Components/InputError.vue';
// import InputLabel from '@/Components/InputLabel.vue';
// import PrimaryButton from '@/Components/PrimaryButton.vue';
// import TextInput from '@/Components/TextInput.vue';
import axios from 'axios';
import { Link } from '@inertiajs/inertia-vue3';

const props = defineProps({
    course: Object,
})

const form = useForm({
    code: props.course ? props.course.code : '',
    name: props.course ? props.course.name : '',
    target_enrolee: props.course ? props.course.target_enrolee : 0,
    tp_code: props.course ? props.course.tp_code : '',
    status: props.course ? props.course.status : 1
})

const back = () => {
    window.history.back();
}

const statusOptions = ref([
    {
        label: 'Active',
        value: '1',
    },
    {
        label: 'Inactive',
        value: '2',
    }
]);

</script>

<template>
    <Head title="Create Course" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex item-center">
                <!-- <ui-icon-button icon="keyboard_backspace" class="mr-3 text-xs" @click="back()"></ui-icon-button> -->
                <Link :href="route('course.index')"><ui-icon-button icon="keyboard_backspace" class="mr-3 text-xs"></ui-icon-button></Link>
                <div class="flex items-center">
                    <h2 class="font-semibold text-lg text-gray-800 leading-tight">
                        <span v-if="!props.course">
                            Create Course
                        </span>
                        <span v-else>
                            Update Course
                        </span>
                    </h2>
                </div>
            </div>
        </template>

        <div class="">
            <form @submit.prevent="props.course ? form.put(route('course.update', props.course.id)) : form.post(route('course.store'))" class="px-4 mx-auto space-y-3">
                <div>
                    <ui-textfield v-model="form.code" id="code" class="mt-1 block w-full" input-type="text" required :attrs="{autofocus}">
                        Code
                    </ui-textfield>
                    <InputError class="mt-1" :message="form.errors.code" />
                    <!-- <InputLabel for="code" value="Code" />
                    <TextInput id="code" type="text" class="mt-1 block w-full" v-model="form.code" autofocus />
                    <InputError class="mt-1" :message="form.errors.code" /> -->
                </div>
                <div>
                    <ui-textfield v-model="form.name" id="name" class="mt-1 block w-full" input-type="text" required :attrs="{autofocus}">
                        Name
                    </ui-textfield>
                    <InputError class="mt-1" :message="form.errors.name" />
                    <!-- <InputLabel for="name" value="Name" />
                    <TextInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" autofocus />
                    <InputError class="mt-1" :message="form.errors.name" /> -->
                </div>
                <div>
                    <ui-textfield v-model="form.tp_code" id="tp_code" class="mt-1 block w-full" input-type="text" required :attrs="{autofocus}">
                        TP Code
                    </ui-textfield>
                    <InputError class="mt-1" :message="form.errors.tp_code" />
                    <!-- <InputLabel for="tp_code" value="TP Code" />
                    <TextInput id="tp_code" type="text" class="mt-1 block w-full" v-model="form.tp_code" autofocus />
                    <InputError class="mt-1" :message="form.errors.tp_code" /> -->
                </div>
                <div>
                    <ui-textfield v-model="form.target_enrolee" id="target_enrolee" class="mt-1 block w-full" input-type="number" required
                        :attrs="{autofocus}">
                        TP Code
                    </ui-textfield>
                    <InputError class="mt-1" :message="form.errors.target_enrolee" />
                    <!-- <InputLabel for="target_enrolee" value="Target Enrolees" />
                    <TextInput id="target_enrolee" type="number" class="mt-1 block w-full" v-model="form.target_enrolee" autofocus />
                    <InputError class="mt-1" :message="form.errors.target_enrolee" /> -->
                </div>
                <div>

                    <ui-select v-model="form.status" :options="statusOptions">
                        Status
                    </ui-select>
                    <InputError class="mt-1" :message="form.errors.status" />

                    <!-- <InputLabel for="status" value="Status" />
                    <select v-model="form.status"
                        class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        <option value="1">Active</option>
                        <option value="2">Inactive</option>
                    </select>
                    <InputError class="mt-1" :message="form.errors.status" /> -->
                </div>
                        
                <div class="flex justify-end mt-4">
                    <ui-button nativeType="submit" raised icon="add" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        <span v-if="!props.course">Create</span>
                        <span v-else>Update</span>
                    </ui-button>
                    <!-- <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        <PlusSmallIcon class="h-5 w-5 mr-1" />
                        <span v-if="!props.course">Create</span>
                        <span v-else>Update</span>
                    </PrimaryButton> -->
                </div>
            </form>
        </div>
    </AuthenticatedLayout>
</template>
