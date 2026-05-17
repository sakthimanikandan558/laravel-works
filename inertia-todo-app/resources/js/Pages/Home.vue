<script setup>
import { router, usePage } from '@inertiajs/vue3'

const page = usePage()
console.log(page.props)

const logout = () => {
    router.post('/logout')
}
</script>

<template>
    <div class="min-h-screen bg-gray-100 p-10">

        <div class="max-w-4xl mx-auto bg-white p-8 rounded-2xl shadow-lg">

            <div class="flex items-center justify-between">

                <h1 class="text-3xl font-bold">
                    Todo Dashboard
                </h1>

                <button
                    @click="logout"
                    class="bg-red-500 hover:bg-red-600 text-white px-5 py-2 rounded-lg"
                >
                    Logout
                </button>

            </div>

            <!-- Welcome User -->
            <h1>
                Welcome {{ $page.props.auth.user?.name }}
            </h1>

        </div>

    </div>
</template>