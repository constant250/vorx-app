<script setup>
import { ref } from 'vue';
import { Head, useForm } from '@inertiajs/inertia-vue3';
import InputError from '@/Components/InputError.vue';
import axios from 'axios';
import { Link } from '@inertiajs/inertia-vue3';
import { Inertia } from '@inertiajs/inertia';


const data = ref([
    {
        id: 1,
        code: 'czxc2311',
        description: 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
        status: 1
    },
    {
        id: 2,
        code: 'czxc2311',
        description: 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
        status: 2
    },
    {
        id: 3,
        code: 'czxc2311',
        description: 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
        status: 2
    },
    {
        id: 4,
        code: 'czxc2311',
        description: 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
        status: 2
    },
]);

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

const thead = ref([
    {
        value: 'Code',
        sort: 'asc',
        columnId: 'code'
    },
    {
        value: 'Description',
        sort: 'asc',
        columnId: 'description'
    },
    'Status',
    'Action']);
const tbody = ref([
    'code',
    'description',
    {
        slot: 'status'
    },
    {
        slot: 'actions'
    }
]);

const page = ref(1);
const total = ref(10);
const list = ref([
    {
        id: 1,
        name: 'xx/xx/xxxx'
    },
    {
        id: 2,
        name: 'course name'
    }
]);

const config = ref({
    defaultDate: 'today'
});

const dateFrom = ref('');
const dateTo = ref('');

const form = useForm({
    cricos_code: '',
    duration: '',
    training_work_weekly: '',
    location: '',
    material_fees: '',
    enrolment_application_fees: '',
    onshore_tuition_fee: '',
    offshore_tuition_fee: '',
    package: '',
});

const Options = ref([
    {
        label: 'Option 1',
        value: '1',
    },
    {
        label: 'Option 2',
        value: '2',
    },
    {
        label: 'Option 3',
        value: '3',
    },
    {
        label: 'Option 4',
        value: '4'
    },
    {
        label: 'Option 5',
        value: '5',
    },
]);

const active = ref(0);
const treaty = ref(0);
const vet = ref(0);
const mainTabs = ref(0);

</script>

<style>
.divider-left-align .mdc-divider__text::before {
    width: 2%;
}

.divider-left-align .mdc-divider__text::after {
    width: 98%;
}

table thead tr th{
    background: #000;
    color: #FFF;
    padding: 5px;
}
table tbody tr td{
    padding: 5px;
    border-bottom: 1px solid #e7e7e7;
}
table tbody tr:last-child td{
    border-bottom: none;
}
</style>

<template>
    <div>
        <form>
            <ui-collapse with-icon ripple>
                <template #toggle>
                    <dvi>CHC50121 - Diploma of Early Childhood Education and Care VIC</dvi>
                </template>
                <div>
                    <ui-grid class="demo-grid">
                        <ui-grid-cell class="demo-cell" columns="6">
                            <ui-select v-model="form.location" :options="Options" class="mt-1 block w-full">
                                Location:
                            </ui-select>
                            <InputError class="mt-1" :message="form.errors.location" />
                        </ui-grid-cell>
                        <ui-grid-cell class="demo-cell" columns="6">
                            <ui-textfield v-model="form.cricos_code" id="code" class="mt-1 block w-full" input-type="text" required>
                                Concessional Fee:
                            </ui-textfield>
                            <InputError class="mt-1" :message="form.errors.cricos_code" />
                        </ui-grid-cell>
                        <ui-grid-cell class="demo-cell" columns="6">
                            <ui-textfield v-model="form.duration" id="code" class="mt-1 block w-full" input-type="number" required>
                                Non-concessional Fees:
                            </ui-textfield>
                            <InputError class="mt-1" :message="form.errors.duration" />
                        </ui-grid-cell>
                        <ui-grid-cell class="demo-cell" columns="6">
                            <ui-textfield v-model="form.training_work_weekly" id="code" class="mt-1 block w-full" input-type="number" required>
                                Full Fee:
                            </ui-textfield>
                            <InputError class="mt-1" :message="form.errors.training_work_weekly" />
                        </ui-grid-cell>
                        <ui-grid-cell class="demo-cell" columns="6">
                            <ui-textfield v-model="form.material_fees" id="code" class="mt-1 block w-full" input-type="number" required>
                                Minimum Payment:
                            </ui-textfield>
                            <InputError class="mt-1" :message="form.errors.material_fees" />
                        </ui-grid-cell>



                    </ui-grid>
                </div>
            </ui-collapse>
        </form>

    </div>
</template>