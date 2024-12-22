<?php

namespace App\Filament\Resources\CustomerResource\Pages;

use App\Filament\Resources\CustomerResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use JoseEspinal\RecordNavigation\Traits\HasRecordNavigation;


class EditCustomer extends EditRecord
{
    use HasRecordNavigation;

    protected static string $resource = CustomerResource::class;

    // protected function getHeaderActions(): array
    // {
    //     return array_merge(parent::getActions(), $this->getNavigationActions());
    // }
    // protected function getFormActions(): array
    // {
    //     return [
            
    //     ];
    // }
}
