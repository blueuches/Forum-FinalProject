<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Log in" />

        <div v-if="status" class="mb-4 text-sm font-medium text-green-600">
            {{ status }}
        </div>

        <form @submit.prevent="submit" class="max-w-md mx-auto bg-white shadow-lg rounded-md p-6 mt-10">
            <div>
                <InputLabel for="email" value="Email" />

                <TextInput
                    id="email"
                    type="email"
                    class="mt-1 block w-full"
                    v-model="form.email"
                    autofocus
                    autocomplete="username"
                />

                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="mt-4">
                <InputLabel for="password" value="Password" />

                <TextInput
                    id="password"
                    type="password"
                    class="mt-1 block w-full"
                    v-model="form.password"
                    autocomplete="current-password"
                />

                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="mt-4 block">
                <label class="flex items-center">
                    <Checkbox name="remember" v-model:checked="form.remember" />
                    <span class="ms-2 text-sm text-gray-600"
                        >Remember me</span
                    >
                </label>
            </div>

            <div class="mt-4 flex items-center justify-end">
                <Link
                    v-if="canResetPassword"
                    :href="route('password.request')"
                    class="rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                >
                    Forgot your password?
                </Link>

                <PrimaryButton
                    class="ms-4 bg-[#a2cf6e] hover:bg-green-700"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    Log in
                </PrimaryButton>
            </div>

                        <!-- Continue with Google -->
                        <div class="mt-4 flex justify-center">
                <a :href="route('google-auth')" class="inline-flex items-center px-4 py-2  bg-[#a2cf6e] border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M23.5 12.275c0-.85-.075-1.675-.212-2.475H12v4.695h6.455a5.52 5.52 0 0 1-2.39 3.63v2.99h3.855c2.26-2.08 3.58-5.15 3.58-8.84z" fill="#4285F4"/>
                        <path d="M12 24c3.24 0 5.96-1.07 7.94-2.9l-3.855-2.99c-1.08.72-2.45 1.15-4.085 1.15a7.62 7.62 0 0 1-7.19-5.18H1.78v3.07A12.01 12.01 0 0 0 12 24z" fill="#34A853"/>
                        <path d="M4.81 14.08a7.26 7.26 0 0 1 0-4.16v-3.07H1.78a12.01 12.01 0 0 0 0 10.3l3.03-3.07z" fill="#FBBC05"/>
                        <path d="M12 4.78c1.76 0 3.36.62 4.61 1.84l3.455-3.455C17.96 1.07 15.24 0 12 0A12.01 12.01 0 0 0 1.78 6.85L4.81 9.92A7.62 7.62 0 0 1 12 4.78z" fill="#EA4335"/>
                    </svg>
                    Continue with Google
                </a>
            </div>
        </form>
    </GuestLayout>
</template>
