<div class="flex justify-center items-center">
    @if ($getState()) 
        <img src="{{ asset('storage/avatars/' . $getState()) }}" alt="Avatar" class="w-10 h-10 rounded-full">
    @else
        <div class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center">
            <span>No Avatar</span>
        </div>
    @endif
</div>