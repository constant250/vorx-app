<script setup>
import { ref } from 'vue';
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

const openFilter = ref(false);

const records = ref([
    {
        label: '10',
        value: '10'
    },
    {
        label: '25',
        value: '50',
    },
    {
        label: '50',
        value: '50'
    },
    {
        label: '100',
        value: '100'
    },
]);

const courseSelected = ref('all');
const courseOptions = ref([
    {
        label: 'All',
        value: '',
    },
    {
        label: 'Course 1',
        value: 'course1',
    },
    {
        label: 'Course 2',
        value: 'course2',
    },
    {
        label: 'Course 3',
        value: 'course3',
    },
]);

const locationOptions = ref([
    {
        label: 'All',
        value: '',
    },
    {
        label: 'Victoria',
        value: 'vic',
    },
    {
        label: 'Queensland',
        value: 'qld',
    },
]);

const studentTypeOptions = ref([
    {
        label: 'All Student Type',
        value: '',
    },
    {
        label: 'Student Type 1',
        value: 'type1',
    },
    {
        label: 'Student Type 2',
        value: 'type2',
    },
]);

const statusOptions = ref([
    {
        label: 'All Status',
        value: '',
    },
    {
        label: 'Active',
        value: '1',
    },
    {
        label: 'Inactive',
        value: '2',
    },
]);

const thead = ref([
    {
        value: 'ID',
        sort: 'asc',
        columnId: 'id'
    },
    'Course Name', 
    'TP Code', 
    'Target Enrolees', 
    'Status', 
    'Action']);
const tbody = ref([
    'id', 
    'title', 
    'tp_code', 
    'target_enrolee', 
    {
        slot: 'status'
    }, 
    {
        slot: 'actions'
    }
]);

const page = ref(1);
const total = ref(10);

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

const list = ref([
    {
        id: 1,
        name: 'xx/xx/xxxx'
    },
    {
        id: 2,
        name: 'course name'
    }
])

function removeOneById(id){
    let index = this.list.findIndex((item) => item.id === id);
    this.list.splice(index, 1);
}

const config = ref({
    defaultDate: 'today'
});

const dateFrom = ref('');
const dateTo = ref('');
</script>

<template>
    <Head title="Course" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <h2 class="font-semibold text-lg text-gray-800 leading-tight mr-2">
                        Course
                    </h2>
                    <span class="text-gray-500 text-xs">(12 Courses Listed)</span>
                </div>
                <Link v-button :href="route('course.create')">
                    <div class="flex items-center">
                        <ui-icon :size="24" class="mr-3">add</ui-icon>
                        Add Course
                    </div>
                </Link>
            </div>
        </template>


        <div class="">
            <div class="flex items-center justify-between mb-3">
                <div class="flex items-center">
                    <ui-textfield class="mr-4">
                        Search
                        <template #before>
                            <ui-textfield-icon>search</ui-textfield-icon>
                        </template>
                    </ui-textfield>
                    <ui-menu-anchor>
                        <ui-button icon="filter_alt" @click="openFilter = true">Filter</ui-button>

                        <ui-menu v-model="openFilter" position="BOTTOM_START" class="filter-dropdown">
                            <div class="w-[32rem]">
                                <div class="p-4 grid grid-cols-2 grid-rows-3 gap-4">
                                    <ui-datepicker v-model="dateFrom" icon="calendar_month" withLeadingIcon :config="config" placeholder="From"
                                        clear></ui-datepicker>
                                    <ui-datepicker v-model="dateTo" icon="calendar_month" withLeadingIcon :config="config" placeholder="To"
                                        clear></ui-datepicker>
                                    <ui-select v-model="courseSelected" :options="courseOptions" fixed>
                                        Course:
                                    </ui-select>
                                    <ui-select :options="locationOptions">
                                        Location:
                                    </ui-select>
                                    <ui-select :options="studentTypeOptions">
                                        Student Type:
                                    </ui-select>
                                    <ui-select :options="statusOptions">
                                        Status:
                                    </ui-select>
                                </div>
                                <ui-button unelevated class="w-full !rounded-none">Filter</ui-button>
                            </div>
                        </ui-menu>
                    </ui-menu-anchor>
                </div>
                <div>
                    <span>Records:</span>
                    <ui-select :options="records" class="w-24 ml-4"></ui-select>
                </div>
            </div>
            <div class="flex items-center mb-10">
                <span>Filtered By:</span>
                <ui-chips type="input" :items="list">
                    <ui-chip v-for="item in list" :key="item.id" deletable @remove="removeOneById(item.id)">
                        {{ item.name }}
                    </ui-chip>
                </ui-chips>
            </div>
            <ui-table
            fullwidth
            :data="courses" 
            :thead="thead" 
            :tbody="tbody"
            row-checkbox
            >
                <template #status="{ data }">
                    <span v-if="data.status == 1" class="p-1.5 text-xs font-medium uppercase tracking-wide text-green-800 bg-green-200 rounded-lg bg-opacity-50">
                        Active
                    </span>
                    <span v-if="data.status == 2" class="p-1.5 text-xs font-medium uppercase tracking-wide text-yellow-800 bg-yellow-200 rounded-lg bg-opacity-50">
                        Inactive
                    </span>
                </template>
                <template #actions="{ data }">
                    <Link :href="route('course.edit', data.id)"><ui-icon-button icon="edit"></ui-icon-button></Link>
                    <ui-icon-button @click="confirmDelete(data.id)" icon="delete_outline"></ui-icon-button>
                </template>
                
                <ui-pagination v-model="page" position="center" :total="total" show-total @change="onPage"></ui-pagination>
            </ui-table>
        </div>
    </AuthenticatedLayout>
</template>
