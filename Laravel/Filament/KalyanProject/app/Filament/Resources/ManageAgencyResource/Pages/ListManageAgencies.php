<?php

namespace App\Filament\Resources\ManageAgencyResource\Pages;

use App\Filament\Resources\ManageAgencyResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListManageAgencies extends ListRecords
{
    protected static string $resource = ManageAgencyResource::class;
    protected ?string $heading = 'Manage Agency';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Create Agency'),
        ];
    }

    protected function getTableQuery(): Builder
    {
        // Ensure the correct Eloquent Builder is used
        return parent::getTableQuery()->where('user_id', auth()->id())->orderBy('created_at', 'desc');
    }
    
}
