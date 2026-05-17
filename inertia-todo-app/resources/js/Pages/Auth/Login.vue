<script setup>
import { useForm, Link } from '@inertiajs/vue3'

const form = useForm({
    email: '',
    password: '',
})

const submit = () => {
    form.post('/login')
}
</script>

<template>
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="w-full max-w-md bg-white p-8 rounded-2xl shadow-lg">

            <h1 class="text-3xl font-bold text-center mb-6">
                Login
            </h1>

            <form @submit.prevent="submit" class="space-y-4">

                <div>
                    <input
                        v-model="form.email"
                        type="email"
                        placeholder="Email"
                        class="w-full border rounded-lg px-4 py-3"
                    >

                    <p class="text-red-500 text-sm mt-1" v-if="form.errors.email">
                        {{ form.errors.email[0] }}
                    </p>
                </div>

                <div>
                    <input
                        v-model="form.password"
                        type="password"
                        placeholder="Password"
                        class="w-full border rounded-lg px-4 py-3"
                    >

                    <p class="text-red-500 text-sm mt-1" v-if="form.errors.password">
                        {{ form.errors.password[0] }}
                    </p>
                </div>

                <button
                    :disabled="form.processing"
                    class="w-full cursor-pointer bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-lg font-semibold"
                >
                    Login
                </button>
            </form>

            <p class="text-center mt-6 text-gray-600">
                Don't have an account?

                <Link
                    href="/register"
                    class="text-blue-600 font-semibold"
                >
                    Register
                </Link>
            </p>

        </div>
    </div>
</template>