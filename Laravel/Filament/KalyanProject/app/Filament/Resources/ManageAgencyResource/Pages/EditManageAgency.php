<?php

namespace App\Filament\Resources\ManageAgencyResource\Pages;

use App\Filament\Resources\ManageAgencyResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Hash;


class EditManageAgency extends EditRecord
{
    protected static string $resource = ManageAgencyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\DeleteAction::make(),
        ];
        
    }

    protected function getFormActions(): array
    {
        return [

        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }
        return $data;
    }
}
