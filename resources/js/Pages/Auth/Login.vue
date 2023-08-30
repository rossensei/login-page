<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import Checkbox from '@/Components/Checkbox.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.transform(data => ({
        ...data,
        remember: form.remember ? 'on' : '',
    })).post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <Head title="Log in" />

    <AuthenticationCard>
        <template #logo>
            <img src="../../Components/images/mdc-bg1.jpg" alt="" class="object-cover h-5/6 w-full rounded-l-xl">

            <div class="bg-gray-700 opacity-20 absolute top-0 h-full w-full"></div>

            <div class="absolute top-0 flex-col w-full pt-36">
                <img src="../../Components/images/mdc.jpeg" alt="mdc-logo" class="w-32 h-32 mx-auto mb-3">
                <h1 class="text-5xl font-extrabold text-white text-center">Mater Dei College's <br> Clinic Management <br> System</h1>
            </div>
        </template>

        <template #form>
            <div class="px-20 py-20">

                <h1 class="text-4xl font-extrabold text-gray-700 text-center mb-2">Log in to your account</h1>

                <h4 class="text-lg font-light text-gray-700 text-center mb-3">Welcome Back!</h4>
                <form @submit.prevent="submit">
                    <div>
                        <InputLabel for="email" value="Email" />
                        <TextInput
                            id="email"
                            v-model="form.email"
                            type="email"
                            class="mt-1 block w-full"
                            required
                            autofocus
                            autocomplete="username"
                        />
                        <InputError class="mt-2" :message="form.errors.email" />
                    </div>
        
                    <div class="mt-4">
                        <InputLabel for="password" value="Password" />
                        <TextInput
                            id="password"
                            v-model="form.password"
                            type="password"
                            class="mt-1 block w-full"
                            required
                            autocomplete="current-password"
                        />
                        <InputError class="mt-2" :message="form.errors.password" />
                    </div>
        
                    <div class="block mt-4">
                        <label class="flex items-center">
                            <Checkbox v-model:checked="form.remember" name="remember" />
                            <span class="ml-2 text-sm text-gray-600">Remember me</span>
                        </label>
                    </div>
        
                    <div class="flex items-center mt-4">
                        <!-- <Link v-if="canResetPassword" :href="route('password.request')" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Forgot your password?
                        </Link> -->
        
                        <PrimaryButton class="w-full" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            <span class="text-white">Login</span>
                        </PrimaryButton>
                    </div>
                </form>
            </div>
        </template>
    </AuthenticationCard>
</template>