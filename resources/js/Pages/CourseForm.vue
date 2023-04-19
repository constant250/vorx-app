<script setup>
import { ref } from 'vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/inertia-vue3';
// import { ArrowLeftCircleIcon } from '@heroicons/vue/24/solid'
// import { PlusSmallIcon } from '@heroicons/vue/24/solid'
// import ButtonLink from '@/Components/ButtonLink.vue';
import InputError from '@/Components/InputError.vue';
// import InputLabel from '@/Components/InputLabel.vue';
// import PrimaryButton from '@/Components/PrimaryButton.vue';
// import TextInput from '@/Components/TextInput.vue';
import CourseInfoTab from '@/Pages/Courses/Tabs/CourseInfoTab.vue';
import CourseUnitsTab from '@/Pages/Courses/Tabs/CourseUnitsTab.vue';
import CourseStructureFeesIntlTab from '@/Pages/Courses/Tabs/CourseStructureFeesIntlTab.vue';
import CourseStructureFeesDomTab from '@/Pages/Courses/Tabs/CourseStructureFeesDomTab.vue';
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

const mainTabs   = ref(0);

</script>

<style>
.stacked-tabs div.mdc-tab-scroller__scroll-content{
    display: block;
    flex: auto;
}
.stacked-tabs div.mdc-tab-scroller__scroll-content button{
    min-width: 1px;
    width: 100%;
    text-align: left;
    justify-content: start;
    white-space: break-spaces;
    margin-bottom: 10px;
}
</style>

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

        <div>
            <div class="grid grid-cols-5 gap-5">
                <ui-tabs v-model="mainTabs" class="stacked-tabs pr-4 border-r-2 border-gray-400">
                    <ui-tab>Info</ui-tab>
                    <ui-tab>Units</ui-tab>
                    <ui-tab>Course Structure and Fees(International)</ui-tab>
                    <ui-tab>Course Structure and Fees(Domestic)</ui-tab>
                    <ui-tab>Training Delivery Location</ui-tab>
                    <ui-tab>Attachments</ui-tab>
                </ui-tabs>
                <ui-panels v-model="mainTabs" class="col-span-4">
                    <ui-panel>
                        <CourseInfoTab />
                    </ui-panel>
                    <ui-panel>
                        <CourseUnitsTab />
                    </ui-panel>
                    <ui-panel>
                        <CourseStructureFeesIntlTab />
                    </ui-panel>
                    <ui-panel>
                        <CourseStructureFeesDomTab />
                    </ui-panel>
                    <ui-panel>Training Delivery Location</ui-panel>
                    <ui-panel>Attachments</ui-panel>
                </ui-panels>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
