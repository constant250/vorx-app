<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
import axios from 'axios';

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: '',
    password: '',
    remember: false
});

const submit = () => {
    // form.post(route('login'), {
    //     onFinish: () => form.reset('password'),
    // });

    axios.get('/sanctum/csrf-cookie').then(res => {
        console.log(res)
        axios.post('/api/v1/login', {
            email: form.email,
            password: form.password
        }).then(res => {
            localStorage.setItem('user-token', res.data.data.token)
            axios.post('/login', {
                email: form.email,
                password: form.password
            })
            .then(response => {
                window.location.href = '/dashboard'
            })
        }).catch(error => {
            console.log(error)
        }); // credentials didn't match
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Log in" />
        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>
        <form @submit.prevent="submit" class="shadow-lg rounded-lg p-5 backdrop-blur-sm backdrop-saturate-50 bg-white/30 shadow-lg">

            <div>
                <ui-textfield 
                    input-type="email"
                    v-model="form.email"
                    required 
                    class="w-full"
                    :attrs="{autocomplete: 'username'}">
                    Email Address
                </ui-textfield>
                <InputError class="mt-2" :message="form.errors.email" />
                <!-- <InputLabel for="email" value="Email" class="text-white" />
                <TextInput id="email" type="email" class="mt-1 block w-full focus:ring-1 focus:ring-blue-500" v-model="form.email" required autofocus autocomplete="username" />
                <InputError class="mt-2" :message="form.errors.email" /> -->
            </div>
                
            <div class="mt-4">
                <ui-textfield 
                    input-type="password"
                    v-model="form.password"
                    required 
                    class="w-full"
                    :attrs="{ autocomplete: 'current-password'}">
                    Password
                </ui-textfield>
                <InputError class="mt-2" :message="form.errors.password" />
                <!-- <InputLabel for="password" value="Password" class="text-white" />
                <TextInput id="password" type="password" class="mt-1 block w-full focus:ring-1 focus:ring-blue-500" v-model="form.password" required autocomplete="current-password" />
                <InputError class="mt-2" :message="form.errors.password" /> -->
            </div>
                
            <div class="block mt-4">
                <label class="flex items-center">
                    <Checkbox name="remember" v-model:checked="form.remember" />
                    <span class="ml-2 text-sm text-white">Remember me</span>
                </label>
            </div>
                
            <div class="flex items-center justify-end mt-4">
                <ui-button nativeType="submit" class="w-full" :class="{ 'opacity-25': form.processing }" :disabled="form.processing" unelevated>Log in</ui-button>
            </div>
        </form>
    </GuestLayout>
</template>
