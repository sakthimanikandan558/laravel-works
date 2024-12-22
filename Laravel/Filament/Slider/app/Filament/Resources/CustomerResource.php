<?php

namespace App\Filament\Resources;

use App\Filament\Exports\CustomerExporter;
use App\Filament\Resources\CustomerResource\Pages;
use App\Filament\Resources\CustomerResource\RelationManagers;
use App\Models\Customer;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use DiscoveryDesign\FilamentGaze\Forms\Components\GazeBanner;
use Filament\Tables\Actions\ExportAction;
use Rupadana\FilamentSlider\Components\Concerns\InputSliderBehaviour;
use Rupadana\FilamentSlider\Components\InputSlider;
use Rupadana\FilamentSlider\Components\InputSliderGroup;
use Filament\Actions\Action;
use Eightynine\FilamentPageAlerts\PageAlert;


class CustomerResource extends Resource
{
    protected static ?string $model = Customer::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $recordTitleAttribute = 'name';



    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                GazeBanner::make()
                ->lock()->columnSpan('full'),
                Forms\Components\TextInput::make('name')->required(),
                Forms\Components\TextInput::make('code')->required(),
                Forms\Components\TextInput::make('legal_name')->required(),
                Forms\Components\Select::make('status')
                    ->options([
                        'ACTIVE' => 'ACTIVE',
                        'INACTIVE' => 'INACTIVE',
                        'POTENTIAL' => 'POTENTIAL',
                    ])
                    ->required()->native(false),
                Forms\Components\Select::make('source')
                    ->options([
                        'Direct' => 'Direct',
                        'Indirect' => 'Indirect',
                    ])
                    ->required()->native(false),
                    InputSliderGroup::make()
                    ->sliders([
                        InputSlider::make('min'),
                        InputSlider::make('max')->default(80),
                    ])
                    ->connect([
                        true,
                        false,
                        true
                    ]) // array length must be sliders length + 1
                    ->range([
                        "min" => 10,
                        "max" => 100
                    ])
                    ->step(10)
                    ->behaviour([
                        InputSliderBehaviour::DRAG,
                        InputSliderBehaviour::TAP
                    ])
                    ->enableTooltips()
                    ->label("Limit"),
                // Forms\Components\TextInput::make('created_by')->required(),
                // Forms\Components\TextInput::make('updated_by')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->label('ID')->sortable(),
                TextColumn::make('name')->label('Name')->sortable()->searchable()    ->formatStateUsing(function (string $state) {
                    // This callback is used to modify how the 'status' column is displayed
                    return lcfirst($state);
                }),
                TextColumn::make('code')->label('Code')->sortable()->searchable(),
                TextColumn::make('legal_name')->label('Legal Name')->sortable()->searchable(),
                TextColumn::make('status')->label('Status')->sortable()->searchable(),
                TextColumn::make('source')->label('Source')->sortable()->searchable(),
                TextColumn::make('created_by')->label('Created By')->sortable(),
                TextColumn::make('updated_by')->label('Updated By')->sortable(),
                // TextColumn::make('created_at')->label('Created At')->sortable(),
                // TextColumn::make('updated_at')->label('Updated At')->sortable(),
            ])
            ->filters([
                // Filter::make('active')
                // ->query(fn (Builder $query) => $query->where('status', 'Active'))
                // ->label('Active Customers')
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                // Tables\Actions\Action::make('viewContacts')
                //     ->label('View Contacts')
                //     ->url(fn (Customer $record) => route('filament.resources.customers.viewContacts', $record))
                //     ->icon('heroicon-o-eye'),
            ])
            ->headerActions([
                ExportAction::make()
                    ->exporter(CustomerExporter::class)
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    // public static function getEloquentQuery(): Builder
    // {
    //     return parent::getEloquentQuery()->where('status', 'Active');
    // }

    public static function getRelations(): array
    {
        return [
            RelationManagers\ContactsRelationManager::class,
        ];
    }

    public static function getActions(): array
    {
        return [
            // Custom action for showing notifications
            Action::make('showAlerts')
                ->label('Show Alerts')
                ->action(function () {
                    PageAlert::make()
                        ->title('Saved successfully')
                        ->body('Yey.. Your changes have been saved: ' . now())
                        ->success()
                        ->send();

                    PageAlert::make()
                        ->title('Saved failure')
                        ->body('Ooops, Your changes have not been saved!')
                        ->danger()
                        ->send();

                    PageAlert::make()
                        ->title('This requires your attention')
                        ->body('Hey there, this is important')
                        ->warning()
                        ->url('https://www.google.com', 'Google')
                        ->send();

                    PageAlert::make()
                        ->title('You need to check this out')
                        ->body('This looks like something worth your attention')
                        ->info()
                        ->send();
                })
                ->icon('heroicon-o-bell')
                ->color('primary'),
        ];
    }
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCustomers::route('/'),
            'create' => Pages\CreateCustomer::route('/create'),
            'edit' => Pages\EditCustomer::route('/{record}/edit'),
            // 'viewContacts' => Pages\ViewCustomerContacts::route('/{record}/contacts'),
        ];
    }
}

