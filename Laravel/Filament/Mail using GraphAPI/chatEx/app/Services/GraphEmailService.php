<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\View;

class GraphEmailService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    private function getAccessToken()
    {
        $url = "https://login.microsoftonline.com/" . env('GRAPH_TENANT_ID') . "/oauth2/v2.0/token";

        $response = $this->client->post($url, [
            'form_params' => [
                'client_id' => env('GRAPH_CLIENT_ID'),
                'client_secret' => env('GRAPH_CLIENT_SECRET'),
                'scope' => env('GRAPH_SCOPE'),
                'grant_type' => 'client_credentials',
            ],
        ]);

        return json_decode($response->getBody(), true)['access_token'];
    }

    public function sendEmail($to, $subject, $viewData)
    {
        $token = $this->getAccessToken();
    
        // Replace 'me' with your sender's email address
        $senderEmail = 'alert@ojcommerce.com'; // This should be the sender's email address
        $url = "https://graph.microsoft.com/v1.0/users/$senderEmail/sendMail";
    
        // Render the Blade template
        $body = View::make('emails.task-assigned', $viewData)->render();
    
        $emailData = [
            'message' => [
                'subject' => $subject,
                'body' => [
                    'contentType' => 'HTML',
                    'content' => $body,
                ],
                'toRecipients' => [
                    [
                        'emailAddress' => [
                            'address' => $to,
                        ],
                    ],
                ],
            ],
        ];
    
        try {
            $this->client->post($url, [
                'headers' => [
                    'Authorization' => "Bearer $token",
                    'Content-Type' => 'application/json',
                ],
                'json' => $emailData,
            ]);
        } catch (RequestException $e) {
            throw new \Exception($e->getMessage());
        }
    }
    
}
