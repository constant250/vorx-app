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
    unit: '',
    unit_type: '',
    ass_method: '',
    sfei: '',
    nominal_hours: '',
    scheduled_hours: '',
    train_method: '',
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
.divider-left-align .mdc-divider__text::before{width: 2%;}
.divider-left-align .mdc-divider__text::after{width: 98%;}
</style>

<template>
    <div>
        <form>
            <ui-divider class="divider-left-align">Units</ui-divider>
            <ui-grid class="demo-grid">

                <ui-grid-cell class="demo-cell" columns="9">
                    <ui-select v-model="form.unit" :options="Options" class="mt-1 block w-full">
                        Unit: <i>(Note: to add a new Unit. place a dash "-" between the Unit Code and Unit Title)</i>
                    </ui-select>
                    <InputError class="mt-1" :message="form.errors.unit" />
                </ui-grid-cell>
                <ui-grid-cell class="demo-cell" columns="3">
                    <ui-select v-model="form.unit_type" :options="Options" class="mt-1 block w-full">
                        Unit Type:
                    </ui-select>
                    <InputError class="mt-1" :message="form.errors.unit_type" />
                </ui-grid-cell>
                <ui-grid-cell class="demo-cell" columns="12">
                    <ui-select v-model="form.ass_method" :options="Options" class="mt-1 block w-full">
                        Assessment Method:
                    </ui-select>
                    <InputError class="mt-1" :message="form.errors.ass_method" />
                </ui-grid-cell>
                <ui-grid-cell class="demo-cell" columns="6">
                    <ui-select v-model="form.sfei" :options="Options" class="mt-1 block w-full">
                        Subject Field of Education Identifier:
                    </ui-select>
                    <InputError class="mt-1" :message="form.errors.sfei" />
                </ui-grid-cell>
                <ui-grid-cell class="demo-cell" columns="3">
                    <ui-textfield v-model="form.nominal_hours" id="code" class="mt-1 block w-full" input-type="text" required>
                        Nominal Hours:
                    </ui-textfield>
                    <InputError class="mt-1" :message="form.errors.nominal_hours" />
                </ui-grid-cell>
                <ui-grid-cell class="demo-cell" columns="3">
                    <ui-textfield v-model="form.scheduled_hours" id="code" class="mt-1 block w-full" input-type="text" required>
                        Scheduled Hours:
                    </ui-textfield>
                    <InputError class="mt-1" :message="form.errors.scheduled_hours" />
                </ui-grid-cell>
                <ui-grid-cell class="demo-cell" columns="6">
                    <ui-select v-model="form.pri" :options="Options" class="mt-1 block w-full">
                        Training Method:
                    </ui-select>
                    <InputError class="mt-1" :message="form.errors.pri" />
                </ui-grid-cell>
                <ui-grid-cell class="demo-cell" columns="3">
                    <label class="text-sm block mb-2">VET Flag Status</label>
                    <ui-switch v-model="vet" input-id="basic-switch" :true-value="1" :false-value="0"
                        @selected="balmUI.onChange('vetLabel', $event)">
                        {{ vet }}
                    </ui-switch>
                </ui-grid-cell>
                <ui-grid-cell class="demo-cell" columns="3">
                    <label class="text-sm block mb-2">Set as Active</label>
                    <ui-switch v-model="active" input-id="basic-switch" :true-value="1" :false-value="0"
                        @selected="balmUI.onChange('activeLabel', $event)">
                        {{ active }}
                    </ui-switch>
                </ui-grid-cell>
            </ui-grid>

        </form>

        <div class="flex items-center justify-between mt-3 mb-3">
            <div class="flex items-center">
                <ui-textfield class="mr-4">
                    Search
                    <template #before>
                        <ui-textfield-icon>search</ui-textfield-icon>
                    </template>
                </ui-textfield>
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
        <ui-table fullwidth :data="data" :thead="thead" :tbody="tbody" row-checkbox>
            <template #status="{ data }">
                <span v-if="data.status == 1"
                    class="p-1.5 text-xs font-medium uppercase tracking-wide text-green-800 bg-green-200 rounded-lg bg-opacity-50">
                    Active
                </span>
                <span v-if="data.status == 2"
                    class="p-1.5 text-xs font-medium uppercase tracking-wide text-yellow-800 bg-yellow-200 rounded-lg bg-opacity-50">
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
</template>