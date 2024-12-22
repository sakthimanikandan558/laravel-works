<x-filament::page>
    <div class="space-y-4">
        <h2 class="text-lg font-bold">All Widget Areas</h2>
        @foreach ($areas as $area)
            <div>
                <h3>{{ $area->name }}</h3>
                <ul>
                    @foreach ($area->widgets as $widget)
                        <li>{{ $widget->name }} - {{ $widget->description }}</li>
                    @endforeach
                </ul>
            </div>
        @endforeach

        <h2 class="text-lg font-bold">Sidebar Widgets</h2>
        <ul>
            @foreach ($sidebarWidgets as $widget)
                <li>{{ $widget->name }} - {{ $widget->description }}</li>
            @endforeach
        </ul>

        <h2 class="text-lg font-bold">All Widgets</h2>
        <ul>
            @foreach ($widgets as $widget)
                <li>{{ $widget->name }} - {{ $widget->description }}</li>
            @endforeach
        </ul>
    </div>
</x-filament::page>
