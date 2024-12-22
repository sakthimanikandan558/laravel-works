<?php

namespace App\Filament\Resources\CustomerResource\Pages;

use App\Filament\Resources\CustomerResource;
use EightyNine\FilamentPageAlerts\PageAlert;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Actions\Action;
use Filament\Notifications\Notification;

class CreateCustomer extends CreateRecord
{
    protected static string $resource = CustomerResource::class;
    protected static ?string $label = 'Create';
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        
        $data['created_by']=auth()->id();
        $data['updated_by']=auth()->id();

        return $data;
    }
    protected function getFormActions(): array
    {
        return [
            ...parent::getFormActions(),
            Action::make('Submit')->label('register')->action('saveAndClose')->extraAttributes([
                'style' => 'padding: 6px 35px;background: white; color: #E07E12; border: 1px solid #E07E12; border-radius: 8px'
            ]),
            
        ];
    }
 
    // public function : void
    // {
    //     dd('Sakthi');
    // }
    protected function getRedirectUrl(): string
{
    return $this->getResource()::getUrl('index');
}
    public function saveAndClose(): void
    {
         // Handle form submission here
         $data = $this->form->getState();
        //  dd($data);
         $data['updated_by'] = auth()->id();
         $data['created_by']=auth()->id();
         // Save the record
         $record = $this->getResource()::getModel()::create($data);
         PageAlert::make()
         ->title('Customer Created')
         ->body('The customer record has been created successfully.')
         ->success()
         ->send();


         // Show success notification
        //  Notification::make()
        //      ->title('Details Saved Successfully')
        //      ->icon('heroicon-s-check-circle')
        //      ->success()
        //      ->send();

        //      $this->getResource()::getUrl('index');

        // Redirect to the index page or other URL
        $this->redirect($this->getRedirectUrl());
    }
}
