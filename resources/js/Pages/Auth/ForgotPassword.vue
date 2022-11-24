<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, useForm } from '@inertiajs/inertia-vue3';

defineProps({
    status: String,
});

const form = useForm({
    email: '',
});

const submit = () => {
    form.post(route('password.email'));
};
</script>

<template>
    <GuestLayout>
        <Head title="Forgot Password" />

        <div class="mb-4 text-sm text-white">
            Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.
        </div>

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <form @submit.prevent="submit" class="shadow-lg rounded-lg p-5 backdrop-blur-xl backdrop-saturate-50 bg-white/30">
            <div>
                <InputLabel for="email" value="Email" class="text-white" />
                <TextInput id="email" type="email" class="mt-1 block w-full focus:ring-1 focus:ring-blue-500" v-model="form.email" required autofocus autocomplete="username"  />
                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <ui-button nativeType="submit"  :class="{ 'opacity-25': form.processing }" :disabled="form.processing"
                    unelevated>Email Password Reset Link</ui-button>
            </div>
        </form>
    </GuestLayout>
</template>
