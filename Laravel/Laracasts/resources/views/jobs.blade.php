<!-- resources/views/jobs.blade.php -->
<x-layout>
    <x-slot name="heading">
        Jobs Page
    </x-slot>
    <p>Welcome to the Jobs page!</p>
    <div class="mt-6">
        @foreach ($jobs as $job)
            <div class="p-4 mb-4 border rounded-md shadow-sm bg-white">
                <h2 class="text-lg font-semibold">{{ $job->job_title }}</h2>
                <p class="text-gray-700">Salary: ${{ number_format($job->salary, 2) }}</p>
            </div>
        @endforeach
    </div>
</x-layout>
