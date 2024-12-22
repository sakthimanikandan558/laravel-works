<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ManageAgencyResource\Pages;
use App\Filament\Resources\ManageAgencyResource\RelationManagers;
use App\Filament\Resources\ManageAgencyResource\RelationManagers\UtmSourcesRelationManager;
use App\Models\ManageAgency;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Navigation\NavigationGroup;
use Filament\Panel;
use Filament\Forms\Components\Section;



class ManageAgencyResource extends Resource
{
    protected static ?string $model = ManageAgency::class;

    protected static ?string $navigationLabel = 'Manage Agency';
    protected static ?string $navigationIcon = 'heroicon-o-building-office';
    protected static ?string $navigationGroup = 'Admin';
    protected static ?string $label = 'Manage Agency';
    protected static ?string $breadcrumb = 'Manage Agency';


    

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('')
                    ->schema([
                        Forms\Components\Grid::make(2) // Creates a grid with 2 columns
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->label('Agency Name')
                                    ->placeholder('Enter Agency Name')
                                    ->required()
                                    ->disabledOn('edit'),
                                Forms\Components\TextInput::make('email')
                                    ->email()
                                    ->placeholder('Enter Email ID')
                                    ->label('Email ID')
                                    ->required()
                                    ->hiddenOn('edit'),
                                    // ->visible(fn((string $operation): bool => $operation === 'create')),
                                Forms\Components\TextInput::make('password')
                                    ->password()
                                    ->label('Password')
                                    ->placeholder('Enter Password')
                                    ->required()
                                    ->minLength(2)
                                    ->hiddenOn('edit'),
                            ])
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                ->label('Agency Name'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                
            ]);
    }

    public static function getRelations(): array
    {
        return [
            UtmSourcesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListManageAgencies::route('/'),
            'create' => Pages\CreateManageAgency::route('/create'),
            'edit' => Pages\EditManageAgency::route('/{record}/edit'),
        ];
    }
    // public static function getLabel(): string
    // {
    //     return 'Agency';
    // }
    // public function panel(Panel $panel): Panel
    // {
    //     return $panel
    //         // ...
    //         ->navigationGroups([
    //             NavigationGroup::make()
    //                 ->icon('heroicon-o-building-office'),
    //         ]);
    // }
}
