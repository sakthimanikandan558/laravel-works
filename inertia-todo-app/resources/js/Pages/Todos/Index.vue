<script setup>
import { computed, ref } from 'vue'
import { useForm, router, usePage } from '@inertiajs/vue3'

const props = defineProps({
    todos: Array,
})

const page = usePage()

const activeTab = ref('pending')

const editingId = ref(null)

const editForm = useForm({
    title: '',
})

const createForm = useForm({
    title: '',
})

const createTodo = () => {
    createForm.post('/todos', {
        onSuccess: () => {
            createForm.reset()
        }
    })
}

const startEdit = (todo) => {
    editingId.value = todo.id

    editForm.title = todo.title
}

const cancelEdit = () => {
    editingId.value = null

    editForm.reset()
}

const updateTodo = (todoId) => {
    editForm.put(`/todos/${todoId}`, {
        onSuccess: () => {
            editingId.value = null
        }
    })
}

const deleteTodo = (todoId) => {
    router.delete(`/todos/${todoId}`)
}

const toggleTodo = (todoId) => {
    router.patch(`/todos/${todoId}/toggle`)
}

const logout = () => {
    router.post('/logout')
}

const formatDate = (date) => {
    return new Date(date).toLocaleString('en-IN', {
        dateStyle: 'medium',
        timeStyle: 'short',
    })
}

const filteredTodos = computed(() => {

    if (activeTab.value === 'completed') {
        return props.todos.filter(todo => todo.is_completed)
    }

    return props.todos.filter(todo => !todo.is_completed)
})
</script>

<template>
    <div class="min-h-screen bg-gray-100">

        <!-- Navbar -->
        <div class="bg-white border-b shadow-sm">

            <div class="max-w-4xl mx-auto px-6 py-4 flex items-center justify-between">

                <div>
                    <h1 class="text-2xl font-bold">
                        Todo App
                    </h1>

                    <p class="text-sm text-gray-500 mt-1">
                        Welcome {{ page.props.auth.user.name }}
                    </p>
                </div>

                <button
                    @click="logout"
                    class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-xl"
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
                    @submit.prevent="createTodo"
                    class="flex items-start gap-3"
                >

                    <div class="flex-1">

                        <input
                            v-model="createForm.title"
                            type="text"
                            placeholder="Enter todo..."
                            class="w-full border rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        >

                        <p class="text-red-500 text-sm mt-1" v-if="createForm.errors.title">
                            {{ createForm.errors.title[0] }}
                        </p>

                    </div>

                    <button
                        :disabled="createForm.processing"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl disabled:opacity-50"
                    >
                        Add
                    </button>

                </form>

            </div>

            <!-- Tabs -->
            <div class="flex gap-3 mt-8">

                <button
                    @click="activeTab = 'pending'"
                    :class="[
                        'px-5 py-2 rounded-xl font-medium',
                        activeTab === 'pending'
                            ? 'bg-blue-600 text-white'
                            : 'bg-white'
                    ]"
                >
                    Pending
                </button>

                <button
                    @click="activeTab = 'completed'"
                    :class="[
                        'px-5 py-2 rounded-xl font-medium',
                        activeTab === 'completed'
                            ? 'bg-green-600 text-white'
                            : 'bg-white'
                    ]"
                >
                    Completed
                </button>

            </div>

            <!-- Todo List -->
            <div class="mt-6 space-y-4">

                <div
                    v-if="filteredTodos.length === 0"
                    class="bg-white rounded-2xl p-10 text-center text-gray-500 shadow-sm"
                >
                    No todos found.
                </div>

                <div
                    v-for="todo in filteredTodos"
                    :key="todo.id"
                    class="bg-white rounded-2xl p-5 shadow-sm"
                >

                    <div class="flex items-start justify-between gap-4">

                        <!-- Left -->
                        <div class="flex gap-4 flex-1">

                            <input
                                type="checkbox"
                                :checked="todo.is_completed"
                                @change="toggleTodo(todo.id)"
                                class="w-5 h-5 mt-1"
                            >

                            <div class="flex-1">

                                <!-- Edit Mode -->
                                <div v-if="editingId === todo.id">

                                    <input
                                        v-model="editForm.title"
                                        type="text"
                                        class="w-full border rounded-xl px-4 py-2"
                                    >

                                    <p class="text-red-500 text-sm mt-1">
                                        {{ editForm.errors.title }}
                                    </p>

                                    <div class="flex gap-2 mt-3">

                                        <button
                                            @click="updateTodo(todo.id)"
                                            class="bg-blue-600 text-white px-4 py-2 rounded-lg"
                                        >
                                            Save
                                        </button>

                                        <button
                                            @click="cancelEdit"
                                            class="bg-gray-300 px-4 py-2 rounded-lg"
                                        >
                                            Cancel
                                        </button>

                                    </div>

                                </div>

                                <!-- Normal Mode -->
                                <div v-else>

                                    <h3
                                        :class="[
                                            'text-lg font-medium',
                                            todo.is_completed
                                                ? 'line-through text-gray-400'
                                                : ''
                                        ]"
                                    >
                                        {{ todo.title }}
                                    </h3>

                                    <p class="text-sm text-gray-500 mt-1">
                                        Created at {{ formatDate(todo.created_at) }}
                                    </p>

                                </div>

                            </div>

                        </div>

                        <!-- Actions -->
                        <div
                            v-if="editingId !== todo.id"
                            class="flex gap-2"
                        >

                            <button
                                @click="startEdit(todo)"
                                class="bg-yellow-400 hover:bg-yellow-500 px-4 py-2 rounded-lg text-sm"
                            >
                                Edit
                            </button>

                            <button
                                @click="deleteTodo(todo.id)"
                                class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg text-sm"
                            >
                                Delete
                            </button>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>
</template>