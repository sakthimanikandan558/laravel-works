<script setup>
import { useForm, router, usePage } from '@inertiajs/vue3'

defineProps({
    todos: Array,
})

const page = usePage()

const form = useForm({
    title: '',
})

const submit = () => {
    form.post('/todos', {
        onSuccess: () => {
            form.reset()
        }
    })
}

const logout = () => {
    router.post('/logout')
}
</script>

<template>
    <div class="min-h-screen bg-gray-100">

        <!-- Navbar -->
        <div class="bg-white shadow-sm border-b">

            <div class="max-w-4xl mx-auto px-6 py-4 flex items-center justify-between">

                <div>
                    <h1 class="text-2xl font-bold">
                        Todo App
                    </h1>

                    <p class="text-gray-500 text-sm mt-1">
                        Welcome {{ page.props.auth.user.name }}
                    </p>
                </div>

                <button
                    @click="logout"
                    class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg"
                >
                    Logout
                </button>

            </div>

        </div>

        <!-- Main -->
        <div class="max-w-4xl mx-auto p-6">

            <!-- Create Todo -->
            <div class="bg-white rounded-2xl shadow-sm p-6">

                <h2 class="text-xl font-semibold mb-4">
                    Create Todo
                </h2>

                <form
                    @submit.prevent="submit"
                    class="flex gap-3"
                >

                    <div class="flex-1">

                        <input
                            v-model="form.title"
                            type="text"
                            placeholder="Enter todo..."
                            class="w-full border rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        >

                        <p class="text-red-500 text-sm mt-1">
                            {{ form.errors.title }}
                        </p>

                    </div>

                    <button
                        :disabled="form.processing"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-6 rounded-xl"
                    >
                        Add
                    </button>

                </form>

            </div>

            <!-- Todo List -->
            <div class="mt-8 space-y-4">

                <div
                    v-if="todos.length === 0"
                    class="bg-white p-10 rounded-2xl shadow-sm text-center text-gray-500"
                >
                    No todos yet.
                </div>

                <div
                    v-for="todo in todos"
                    :key="todo.id"
                    class="bg-white rounded-2xl shadow-sm p-5 flex items-center justify-between"
                >

                    <div class="flex items-center gap-4">

                        <div
                            class="w-3 h-3 rounded-full bg-blue-500"
                        ></div>

                        <div>

                            <h3 class="font-medium text-lg">
                                {{ todo.title }}
                            </h3>

                            <p class="text-sm text-gray-500 mt-1">
                                Created at {{ todo.created_at }}
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>
</template>