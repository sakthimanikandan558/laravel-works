<?php

namespace App\Filament\Resources\ManageAgencyResource\Pages;

use App\Filament\Resources\ManageAgencyResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Hash;
use App\Models\ManageAgency;


class CreateManageAgency extends CreateRecord
{
    protected static string $resource = ManageAgencyResource::class;

    protected static ?string $title = 'Create Agency';

    protected function getFormActions(): array
    {
        return [
            Action::make('submit')
                ->label('Register')
                ->action('handleSubmit')
                ->extraAttributes([
                    'style' => 'padding: 6px 35px; background: #D97706; color: white; border: 1px solid #E07E12; border-radius: 8px'
                ]),
            Action::make('cancel')
                ->label('Cancel')
                ->action('handleCancel')
                ->extraAttributes([
                    'style' => 'padding: 6px 35px; background: white; color: #E07E12; border: 1px solid #E07E12; border-radius: 8px'
                ]),
        ];
    }

    public function handleSubmit()
    {
        $data = $this->form->getState();

        // Hash the password before storing it
        $data['password'] = Hash::make($data['password']);
        $data['user_id'] = auth()->id();

        // Store the data in the database
        ManageAgency::create($data);

        // Show success notification
        Notification::make()
            ->title('Success')
            ->body('Agency has been created successfully.')
            ->success()
            ->send();

        // Redirect back to the same page
        $this->getResource()::getUrl('index');
    }

    public function handleCancel()
    {
        // Redirect back to the same page
        return redirect()->to('/admin/manage-agencies'); // Direct URL
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['password'] = Hash::make($data['password']);
        $data['user_id'] = Auth::id();
        return $data;
    }
}
