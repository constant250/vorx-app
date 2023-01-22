<script setup>
import { ref } from 'vue';
import { Head, useForm } from '@inertiajs/inertia-vue3';
import InputError from '@/Components/InputError.vue';
import axios from 'axios';
import { Link } from '@inertiajs/inertia-vue3';

const props = defineProps({
    course: Object,
})

const form = useForm({
    course_name: '',
    course_code: '',
    nominal_hours: '',
    pri: '',
})

const back = () => {
    window.history.back();
}

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
            <ui-divider class="divider-left-align">Course Information</ui-divider>
            <ui-grid class="demo-grid">
                <ui-grid-cell class="demo-cell" columns="5">
                    <ui-textfield v-model="form.course_name" id="code" class="mt-1 block w-full" input-type="text" required>
                        Course Name
                    </ui-textfield>
                    <InputError class="mt-1" :message="form.errors.course_name" />
                </ui-grid-cell>
                <ui-grid-cell class="demo-cell" columns="3">
                    <ui-textfield v-model="form.course_code" id="code" class="mt-1 block w-full" input-type="text" required>
                        Course Code
                    </ui-textfield>
                    <InputError class="mt-1" :message="form.errors.course_code" />
                </ui-grid-cell>
                <ui-grid-cell class="demo-cell" columns="1">
                    <label class="text-sm block mb-2">Active</label>
                    <ui-switch v-model="active" input-id="basic-switch" :true-value="1" :false-value="0"
                        @selected="balmUI.onChange('activeLabel', $event)">
                        {{ active }}
                    </ui-switch>
                </ui-grid-cell>
                <ui-grid-cell class="demo-cell" columns="3">
                    <label class="text-sm block mb-2">Treat as Unit of Competency</label>
                    <ui-switch v-model="treaty" input-id="basic-switch" :true-value="1" :false-value="0"
                        @selected="balmUI.onChange('treatyLabel', $event)">
                        {{ treaty }}
                    </ui-switch>
                </ui-grid-cell>
            </ui-grid>

            <ui-divider class="divider-left-align">Avetmiss</ui-divider>

            <ui-grid class="demo-grid">
                <ui-grid-cell class="demo-cell" columns="6">
                    <ui-textfield v-model="form.nominal_hours" id="code" class="mt-1 block w-full" input-type="text" required>
                        Nominal Hours
                    </ui-textfield>
                    <InputError class="mt-1" :message="form.errors.nominal_hours" />
                </ui-grid-cell>
                <ui-grid-cell class="demo-cell" columns="6">
                    <ui-select v-model="form.pri" :options="Options" class="mt-1 block w-full">
                        Program Recognition Identifier
                    </ui-select>
                    <InputError class="mt-1" :message="form.errors.pri" />
                </ui-grid-cell>
                <ui-grid-cell class="demo-cell" columns="6">
                    <ui-select v-model="form.peli" :options="Options" class="mt-1 block w-full">
                        Program Education Level Identifier
                    </ui-select>
                    <InputError class="mt-1" :message="form.errors.peli" />
                </ui-grid-cell>
                <ui-grid-cell class="demo-cell" columns="6">
                    <ui-select v-model="form.pefi" :options="Options" class="mt-1 block w-full">
                        Program Education Field Identifier
                    </ui-select>
                    <InputError class="mt-1" :message="form.errors.pefi" />
                </ui-grid-cell>
                <ui-grid-cell class="demo-cell" columns="6">
                    <ui-select v-model="form.anzsco" :options="Options" class="mt-1 block w-full">
                        Anzsco Identifier
                    </ui-select>
                    <InputError class="mt-1" :message="form.errors.anzsco" />
                </ui-grid-cell>
                <ui-grid-cell class="demo-cell" columns="6">
                    <label class="text-sm block mb-2">VET Flag Status</label>
                    <ui-switch v-model="vet" input-id="basic-switch" :true-value="1" :false-value="0"
                        @selected="balmUI.onChange('vetLabel', $event)">
                        {{ vet }}
                    </ui-switch>
                </ui-grid-cell>
            </ui-grid>
        </form>
    </div>
</template>