<?php

namespace App\Filament\Resources\CustomerResource\Pages;

use App\Filament\Resources\CustomerResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;


class ListCustomers extends ListRecords
{
    protected static string $resource = CustomerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Create Agency'),
        ];
    }
    protected function getTableQuery(): Builder
    {
        // Ensure the correct Eloquent Builder is used
        return parent::getTableQuery()->where('created_by', auth()->id())->orderBy('created_at', 'desc');
    }
    
}
