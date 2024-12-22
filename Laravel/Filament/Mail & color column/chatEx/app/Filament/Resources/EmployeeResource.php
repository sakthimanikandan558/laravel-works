<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EmployeeResource\Pages;
use App\Filament\Resources\EmployeeResource\RelationManagers;
use App\Filament\Resources\EmployeeResource\RelationManagers\TasksRelationManager;
use App\Models\Employee;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\ExportAction;
use App\Filament\Exports\EmployeeExporter;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Tables\Actions\ImportAction;
use Filament\Tables\Actions\ReplicateAction;

class EmployeeResource extends Resource
{
    protected static ?string $model = Employee::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            TextInput::make('username')
                ->required(),
            TextInput::make('position')
                ->required(),
            TextInput::make('email')
                ->required(),
            
            Repeater::make('members')
                ->schema([
                    TextInput::make('name')->required(),
                    Select::make('role')
                        ->options([
                            'member' => 'Member',
                            'administrator' => 'Administrator',
                            'owner' => 'Owner',
                        ])
                        ->required(),
                ])
                ->columns(2) // Number of columns in the repeater form
                ->required(), // Make repeater required if needed
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('username'),
                TextColumn::make('position'),
                TextColumn::make('email'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                ReplicateAction::make()
                ->beforeReplicaSaved(function (Employee $replica): void {
                    $replica->email='Dump'. $replica->email;
                })
                ->successNotificationTitle('Category replicated'),
            ])
            ->headerActions([
                ExportAction::make()
                ->exporter(EmployeeExporter::class),
                ImportAction::make()
                ->importer(ProductImporter::class)
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            TasksRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEmployees::route('/'),
            'create' => Pages\CreateEmployee::route('/create'),
            'edit' => Pages\EditEmployee::route('/{record}/edit'),
        ];
    }
}
