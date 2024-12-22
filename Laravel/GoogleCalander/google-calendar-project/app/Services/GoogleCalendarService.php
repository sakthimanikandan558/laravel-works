<?php
namespace App\Services;

use Google\Client;
use Google\Service\Calendar;

class GoogleCalendarService
{
    protected $client;
    protected $calendarService;

    public function __construct()
    {
        $this->client = new Client();
        $this->client->setClientId(config('services.google.client_id'));
        $this->client->setClientSecret(config('services.google.client_secret'));
        $this->client->setRedirectUri(config('services.google.redirect'));
        $this->client->addScope(Calendar::CALENDAR_READONLY);
        $this->calendarService = new Calendar($this->client);
    }

    public function authenticate($code)
    {
        $this->client->authenticate($code);
        session(['google_access_token' => $this->client->getAccessToken()]);
    }

    public function getClient()
    {
        if (session('google_access_token')) {
            $this->client->setAccessToken(session('google_access_token'));
        }

        return $this->client;
    }

    public function listEvents($calendarId = 'primary')
    {
        $this->getClient();
        $events = $this->calendarService->events->listEvents($calendarId);
        return $events->getItems();
    }
}
