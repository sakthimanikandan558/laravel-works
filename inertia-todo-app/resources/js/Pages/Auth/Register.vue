<script setup>
import { useForm, Link } from '@inertiajs/vue3'

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
})

const submit = () => {
    form.post('/register')
}
</script>

<template>
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="w-full max-w-md bg-white p-8 rounded-2xl shadow-lg">

            <h1 class="text-3xl font-bold text-center mb-6">
                Register
            </h1>

            <form @submit.prevent="submit" class="space-y-4">

                <div>
                    <input
                        v-model="form.name"
                        type="text"
                        placeholder="Name"
                        class="w-full border rounded-lg px-4 py-3"
                    >

                    <p class="text-red-500 text-sm mt-1" v-if="form.errors.name">
                        {{ form.errors.name[0] }}
                    </p>
                </div>

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

                <div>
                    <input
                        v-model="form.password_confirmation"
                        type="password"
                        placeholder="Confirm Password"
                        class="w-full border rounded-lg px-4 py-3"
                    >
                </div>

                <button
                    :disabled="form.processing"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-lg font-semibold"
                >
                    Register
                </button>
            </form>

            <p class="text-center mt-6 text-gray-600">
                Already have an account?

                <Link
                    href="/login"
                    class="text-blue-600 font-semibold"
                >
                    Login
                </Link>
            </p>

        </div>
    </div>
</template>