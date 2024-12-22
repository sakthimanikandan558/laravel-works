<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StudentPercentageResource\RelationManagers\StudentRelationManager;
use App\Filament\Resources\StudentResource\Pages;
use App\Filament\Resources\StudentResource\RelationManagers;
use App\Models\Student;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\NumericInput;

class StudentResource extends Resource
{
    protected static ?string $model = Student::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                ->required()
                ->maxLength(255),
            TextInput::make('roll_no')
                ->required()
                ->unique()
                ->maxLength(255),
                TextInput::make('tamil')
                ->required()
                ->numeric(),
                TextInput::make('english')
                ->required()
                ->numeric(),
                TextInput::make('maths')
                ->required()
                ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('roll_no'),
                TextColumn::make('tamil'),
                TextColumn::make('english'),
                TextColumn::make('maths'),
                TextColumn::make('total_marks')
                    ->label('Total Marks'),
                TextColumn::make('percentage')
                    ->label('Percentage')
                    ->formatStateUsing(fn ($state) => number_format($state, 2) . '%'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            StudentRelationManager::class, // Add the relation manager here

        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStudents::route('/'),
            'create' => Pages\CreateStudent::route('/create'),
            'edit' => Pages\EditStudent::route('/{record}/edit'),
        ];
    }
}
