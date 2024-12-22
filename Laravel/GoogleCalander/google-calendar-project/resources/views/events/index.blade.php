@extends('layouts.app')

@section('content')
    <h1>Google Calendar Events</h1>

    @if(count($events) > 0)
        <ul>
            @foreach($events as $event)
                <li>{{ $event->getSummary() }} - {{ $event->getStart()->getDateTime() }}</li>
            @endforeach
        </ul>
    @else
        <p>No events found.</p>
    @endif
@endsection
