<?php

namespace App\Filament\Resources\CustomerResource\Pages;

use App\Filament\Resources\CustomerResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;
use AymanAlhattami\FilamentContextMenu\Traits\PageHasContextMenu;
use Filament\Actions\Action;
use AymanAlhattami\FilamentContextMenu\ContextMenuDivider;
use AymanAlhattami\FilamentContextMenu\Actions\{ RefreshAction, GoBackAction, GoForwardAction};
use JoseEspinal\RecordNavigation\Traits\HasRecordsList;






class ListCustomers extends ListRecords
{
    use PageHasContextMenu;
    use HasRecordsList;


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

    public function getContextMenuActions(): array
    {
        return [
            Action::make('Create user')
            ->url(CreateCustomer::getUrl()),
            ContextMenuDivider::make(),
            RefreshAction::make(),
            GoBackAction::make(),
            GoForwardAction::make()

        ];
    }

    
}
