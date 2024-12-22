<?php
namespace App\Http\Controllers;

use App\Services\GoogleCalendarService;
use Illuminate\Http\Request;

class GoogleCalendarController extends Controller
{
    protected $googleService;

    public function __construct(GoogleCalendarService $googleService)
    {
        $this->googleService = $googleService;
    }

    public function redirectToGoogle()
    {
        return redirect()->away($this->googleService->getClient()->createAuthUrl());
    }

    public function handleGoogleCallback(Request $request)
    {
        $this->googleService->authenticate($request->get('code'));
        return redirect('/events');
    }

    public function showEvents()
    {
        $events = $this->googleService->listEvents();
        return view('events.index', compact('events'));
    }
}
