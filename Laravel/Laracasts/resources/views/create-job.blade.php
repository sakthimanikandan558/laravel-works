<x-layout>
    <x-slot name="heading">
        Create Job
    </x-slot>

    <form action="{{ route('jobs.store') }}" method="POST" class="max-w-md mx-auto mt-8">
        @csrf
        <div class="mb-4">
            <label for="job_title" class="block text-sm font-medium text-gray-700">Job Title</label>
            <input type="text" name="job_title" id="job_title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
        </div>

        <div class="mb-4">
            <label for="salary" class="block text-sm font-medium text-gray-700">Salary</label>
            <input type="number" name="salary" id="salary" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
        </div>

        <div class="flex items-center justify-end mt-4">
            <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-300 disabled:opacity-25 transition">
                Create Job
            </button>
        </div>
    </form>
</x-layout>
