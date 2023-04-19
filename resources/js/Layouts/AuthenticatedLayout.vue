<script setup>
import { ref } from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import { Link } from '@inertiajs/inertia-vue3';
import axios from 'axios';

const openProfile = ref(false);
const openNotification = ref(false);
const showingNavigationDropdown = ref(false);
const user_name = localStorage.getItem('user_name');
const user_email = localStorage.getItem('user_email');

const logout = () => {
    axios.post('/api/v1/logout')
    .then(res => {
        if(res.data.status == 'Success') {
            localStorage.removeItem('user-token')
            localStorage.removeItem('isViewed')
            localStorage.removeItem('isLogged')
            localStorage.removeItem('user_name')
            localStorage.removeItem('user_email')

            axios.post('/logout')
            .then(response => {
                if(response.data.status == 'success') {
                    window.location.href = '/login'
                }
            })
            .catch(error => {
                console.log(error)
            })
        }
    })
    .catch(err => {
        console.log(err)
    })
}

const flashColor = (status) => {
    switch (status) {
        case 'success':
            return 'green'
        case 'error':
            return 'red'
    
        default:
            return 'gray'
    }
}

</script>

<style scoped>
.app-main {
    background: #2c2d44;
    background-image: -moz-linear-gradient(45deg, #3f3251 2%, #002025 100%);
    background-image: -webkit-linear-gradient(45deg, #3f3251 2%, #002025 100%);
    background-image: linear-gradient(45deg, #3f3251 2%, #002025 100%);
}
.dropdown .dropdown-btn{
    color: #FFF;
}
.global-search{background-color: transparent;}
.global-search .material-icons{color: #ffffff80;}
</style>
<style>
.dropdown .dropdown-btn .mdc-button__label {
    display: flex;
    align-items: center;
}
.global-search .mdc-floating-label {
    color: #ffffff80 !important;
}
.global-search .mdc-text-field__input {
    color: #FFF !important;
    font-size: 12px;
}
.global-search:not(.mdc-text-field--disabled) .mdc-line-ripple:before {
    border-bottom-color: #ffffff80 !important;
}

.notification-dropdown ul{
    padding: 0;
}

.mdc-text-field__input {
    --tw-ring-shadow: 0 !important;
}

.filter-dropdown ul {
    padding: 0;
}

.\!rounded-none {
    border-radius: 0 !important;
}
</style>

<template>
    <div>
        <div class="app-main min-h-screen">

            <div class="p-10">
                <div class="grid grid-rows-1 grid-cols-6 gap-7 min-h-screen">
                    <div class="col-span-1 ...">
                        <div class="sidenav shadow-lg pb-5 rounded-xl backdrop-blur-lg backdrop-saturate-50 bg-white/50">
                            <div class="grow w-full flex items-center justify-center p-5 mb-5">
                                <Link :href="route('dashboard')">
                                    <ApplicationLogo class="block h-9 w-auto" />
                                </Link>
                            </div>
                            <!-- Navigation Links -->
                            <div class="sm:flex sm:flex-col pr-7">
                                <NavLink :href="route('dashboard')" :active="route().current('dashboard')" class="flex content-center">
                                    <ui-icon :size="24" class="mr-2">home</ui-icon>
                                    Dashboard
                                </NavLink>
                                <NavLink :href="route('course.index')" :active="route().current('course.index')" class="flex content-center">
                                    <ui-icon :size="24" class="mr-2">auto_stories</ui-icon>
                                    Course
                                </NavLink>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-5 ...">

                        <div class="mb-5">
                            <div class="flex justify-between">
                                <div class="flex items-center">
                                    <ui-textfield class="global-search">
                                        Search...
                                        <template #before>
                                            <ui-textfield-icon>search</ui-textfield-icon>
                                        </template>
                                    </ui-textfield>
                                    <ui-menu-anchor class="mx-5">
                                        <ui-badge overlap :count="8">
                                            <ui-icon @click="openNotification = true" class="text-white cursor-pointer">notifications_none</ui-icon>
                                        </ui-badge>
                                        <!-- <ui-icon-button @click="openNotification = true" icon="notifications_none" class="text-white"></ui-icon-button> -->

                                        <ui-menu class="notification-dropdown overflow-hidden" v-model="openNotification" position="BOTTOM_START">
                                            <div class="w-80">
                                                <div class="text-center text-xs py-2 shadow">
                                                    Notifications
                                                </div>
                                                <ui-list :type="2">
                                                    <ui-item v-for="i in 3" :key="i">
                                                        <ui-item-text-content>
                                                            <ui-item-text1>Enrolment Form Submission</ui-item-text1>
                                                            <ui-item-text2>Nov 16, 2022 | 10:34 pm</ui-item-text2>
                                                        </ui-item-text-content>
                                                    </ui-item>
                                                </ui-list>
                                            </div>
                                        </ui-menu>
                                    </ui-menu-anchor>
                                    
                                </div>
                                <!-- Settings Dropdown -->
                                <div class="flex items-center">
                                    <div class="text-white px-2 text-sm">
                                        Wednesday, Nov 16, 2022
                                    </div>
                                    <div class="text-white mx-2">|</div>
                                    <ui-menu-anchor class="dropdown">
                                        <ui-button class="dropdown-btn text-sm" @click="openProfile = true">Hi, {{ user_name }} <img :src="'/default/img/default-user.png'" alt="" class="w-7 rounded-full ml-2 mr-1"><ui-icon>arrow_drop_down</ui-icon>
                                        </ui-button>
                                        <ui-menu class="dropdown-menu w-44" v-model="openProfile" position="BOTTOM_START">
                                            <ui-menuitem>
                                                <ui-menuitem-text class="flex items-center text-xs">
                                                    <ui-icon class="mr-3" :size="18">face</ui-icon> My Profile
                                                </ui-menuitem-text>
                                            </ui-menuitem>
                                            <ui-menuitem>
                                                <ui-menuitem-text class="flex items-center text-xs">
                                                    <ui-icon class="mr-3" :size="18">settings</ui-icon>Settings
                                                </ui-menuitem-text>
                                            </ui-menuitem>
                                            <ui-menuitem-divider></ui-menuitem-divider>
                                            <ui-menuitem @click="logout()" as="button">
                                                <ui-menuitem-text class="flex items-center text-xs">
                                                    <ui-icon class="mr-3" :size="18">logout</ui-icon>Logout
                                                </ui-menuitem-text>
                                            </ui-menuitem>
                                        </ui-menu>
                                    </ui-menu-anchor>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white rounded-xl">
                            <!-- Page Heading -->
                            <header class="bg-white shadow rounded-t-lg" v-if="$slots.header">
                                <div class="mx-auto py-5 px-3 sm:px-6">
                                    <slot name="header" />
                                </div>
                            </header>
                            
                            <!-- Flash Message Content -->
                            <div v-if="$page.props.flash.message" class="mx-auto pt-6 px-4 sm:px-6 lg:px-8">
                                <div :class="`bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative`" role="alert">
                                    <strong class="font-bold">{{ $page.props.flash.message }}</strong>
                                </div>
                            </div>
                            
                            <!-- Page Content -->
                            <main class="p-10">
                                <slot />
                            </main>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</template>
