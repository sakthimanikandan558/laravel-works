<?php

namespace App\Filament\Resources\StudentPercentageResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Widgets\RadialBarChart;
use App\Models\Student;

class StudentRelationManager extends RelationManager
{
    protected static string $relationship = 'Student';
    protected function getHeaderWidgets(): array
    {
        return [
            RadialBarChart::class,
        ];
    }

    /**
     * Get the data for the widget.
     *
     * @return array
     */
    protected function getData(): array
    {
        $studentId = request()->route('record'); // Get the student ID from the route
        $student = Student::find($studentId);

        $percentage = $student ? $student->percentage : 0;

        return [
            'percentage' => $percentage,
        ];
    }
}
