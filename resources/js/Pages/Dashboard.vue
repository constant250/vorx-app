<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';

const sampleButton = () => {
    axios.get('/api/v1/products')
    .then(res => {
        console.log(res.data)
    })
}

</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-lg text-gray-800 leading-tight">
                Dashboard 
            </h2>
        </template>

        <div class="">
            <div class="grid grid-cols-3 grid-rows-3 gap-6">
                <div class="col-span-1 ...">
                    <div class="w-full shadow-md overflow-hidden rounded-lg border border-gray-300">
                        <div class="card-header px-3 py-1 pb-0 flex items-center justify-between shadow">
                            <div>
                                <h3 class="text-xs">Students</h3>
                                <p class="text-base font-bold">1655</p>
                            </div>
                            <ui-icon-button icon="add"></ui-icon-button>
                        </div>
                        <div class="card-body px-3 py-3">
                            <div class="h-80 overflow-y-auto">
                                <ui-list :type="2">
                                    <ui-item v-for="i in 10" :key="i">
                                        <ui-item-text-content>
                                            <ui-item-text1>Student {{i}}</ui-item-text1>
                                            <ui-item-text2>Oct 30, 2022</ui-item-text2>
                                        </ui-item-text-content>
                                    </ui-item>
                                </ui-list>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-1 ...">
                    <div class="w-full shadow-md overflow-hidden rounded-lg border border-gray-300">
                        <div class="card-header px-3 py-1 pb-0 flex items-center justify-between shadow">
                            <div>
                                <h3 class="text-xs">Programs</h3>
                                <p class="text-base font-bold">12</p>
                            </div>
                            <ui-icon-button icon="add"></ui-icon-button>
                        </div>
                        <div class="card-body px-3 py-3">
                            <div class="h-80 overflow-y-auto">
                                <ui-list :type="2">
                                    <ui-item v-for="i in 12" :key="i">
                                        <ui-item-text-content>
                                            <ui-item-text1>(CPC31230) Program</ui-item-text1>
                                            <ui-item-text2>Oct 30, 2022</ui-item-text2>
                                        </ui-item-text-content>
                                    </ui-item>
                                </ui-list>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-1 ...">
                    <div class="w-full shadow-md overflow-hidden rounded-lg border border-gray-300">
                        <div class="card-header px-3 py-1 pb-0 flex items-center justify-between shadow">
                            <div>
                                <h3 class="text-xs">Units</h3>
                                <p class="text-base font-bold">240</p>
                            </div>
                            <ui-icon-button icon="add"></ui-icon-button>
                        </div>
                        <div class="card-body px-3 py-3">
                            <div class="h-80 overflow-y-auto">
                                <ui-list :type="2">
                                    <ui-item v-for="i in 10" :key="i">
                                        <ui-item-text-content>
                                            <ui-item-text1>Unit {{i}}</ui-item-text1>
                                            <ui-item-text2>Oct 30, 2022</ui-item-text2>
                                        </ui-item-text-content>
                                    </ui-item>
                                </ui-list>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-2 ...">
                    <div class="w-full shadow-md overflow-hidden rounded-lg border border-gray-300">
                        <div class="card-header px-3 py-2 pb-1 flex items-center justify-between shadow">
                            <div>
                                <h3 class="text-xs">Earnings</h3>
                                <p class="text-base font-bold">AUD$ 1,655.00</p>
                            </div>
                        </div>
                        <div class="card-body px-3 py-3">
                            <div class="h-80 overflow-y-auto">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-1 ...">
                    <div class="w-full shadow-md overflow-hidden rounded-lg border border-gray-300">
                        <div class="card-header px-3 py-2 pb-1 flex items-center justify-between shadow">
                            <div>
                                <h3 class="text-xs">Staff Activities</h3>
                                <p class="text-base font-bold">Wed, Nov 16, 2022</p>
                            </div>
                        </div>
                        <div class="card-body px-3 py-3">
                            <div class="h-80 overflow-y-auto">
                                <ui-list :type="2">
                                    <ui-item v-for="i in 10" :key="i">
                                        <ui-item-text-content>
                                            <ui-item-text1>Staff Name <span class="text-xs text-gray-500">added student</span></ui-item-text1>
                                            <ui-item-text2>Stuff Activity</ui-item-text2>
                                        </ui-item-text-content>
                                    </ui-item>
                                </ui-list>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-3 ...">
                    <div class="w-full shadow-md overflow-hidden rounded-lg border border-gray-300">
                        <div class="card-header px-3 py-5 pb-4 flex items-center justify-between shadow">
                            <div>
                                <h3 class="text-xs">Notes</h3>
                            </div>
                        </div>
                        <div class="card-body px-3 py-3">
                            <div class="h-80 overflow-y-auto">
                                <ui-list :type="2">
                                    <ui-item v-for="i in 10" :key="i">
                                        <ui-item-text-content>
                                            <ui-item-text1>Student Name | <span class="text-xs text-gray-500">Nov 16, 2022 14:30</span>
                                            </ui-item-text1>
                                            <ui-item-text2>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum perferendis accusantium amet itaque sequi nostrum tempora consectetur atque beatae culpa aliquam similique doloribus fugit distinctio veritatis reprehenderit, quos, odio repellendus?</ui-item-text2>
                                        </ui-item-text-content>
                                    </ui-item>
                                </ui-list>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
