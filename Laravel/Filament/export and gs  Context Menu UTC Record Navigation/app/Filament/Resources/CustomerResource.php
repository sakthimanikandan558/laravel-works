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
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;

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
                // FileUpload::make('avatar')
                // ->image()
                // ->imageEditor()
                // ->circleCropper(),
                SpatieMediaLibraryFileUpload::make('avatar'),
                FileUpload::make('attachments')
                ->multiple()
                ->downloadable(),
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
                // Forms\Components\TextInput::make('created_by')->required(),
                // Forms\Components\TextInput::make('updated_by')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->label('ID')->sortable(),
                // ImageColumn::make('avatar')->circular(),
                SpatieMediaLibraryImageColumn::make('avatar'),
                TextColumn::make('name')->label('Name')->sortable()->searchable(),
                TextColumn::make('code')->label('Code')->sortable()->searchable(),
                TextColumn::make('legal_name')->label('Legal Name')->sortable()->searchable(),
                TextColumn::make('status')->label('Status')->sortable()->searchable(),
                TextColumn::make('source')->label('Source')->sortable()->searchable(),
                TextColumn::make('created_by')->label('Created By')->sortable()->toggleable(isToggledHiddenByDefault:true),
                TextColumn::make('updated_by')->label('Updated By')->sortable()->toggleable(),
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

