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
use IbrahimBougaoua\FilaProgress\Infolists\Components\CircleProgressEntry;
use IbrahimBougaoua\FilaProgress\Infolists\Components\ProgressBarEntry;
use IbrahimBougaoua\FilaProgress\Tables\Columns\CircleProgress;
use IbrahimBougaoua\FilaProgress\Tables\Columns\ProgressBar;
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
                CircleProgress::make('percentage')
                ->label('Percentage')
                ->getStateUsing(function ($record) {
                    // Calculate the percentage based on your logic
                    $totalMarks = $record->tamil + $record->english + $record->maths;
                    $percentage = ($totalMarks / 300) * 100; // Assuming 300 is the total marks
                    return [
                        'total' => 100,      // Total for the progress circle (100%)
                        'progress' => $percentage, // The percentage value calculated
                    ];
                }),
            
// Hide the percentage value if you only want the circular bar
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
