<?php

namespace App\Filament\Resources\EmployeeResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Textarea;
use App\Mail\TaskAssignedMail;
use Illuminate\Support\Facades\Mail;
use App\Services\GraphEmailService;


class TasksRelationManager extends RelationManager
{
    protected static string $relationship = 'tasks';



    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->required(),
                Textarea::make('description'),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('employee_id')
            ->columns([
                TextColumn::make('title'),
                TextColumn::make('description'),
                            ])
            ->filters([
                //
            ])
            // ->headerActions([
            //     Tables\Actions\CreateAction::make()
            //         ->after(function ($record) {
            //             // Fetch the employee associated with this task
            //             $employee = $this->ownerRecord;

            //             // Send the email
            //             Mail::to($employee->email)->send(new TaskAssignedMail($record, $employee));
            //         }),
            // ])

            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->after(function ($record) {
                        // Fetch the employee associated with this task
                        $employee = $this->ownerRecord;

                        // Resolve the GraphEmailService from the container
                        $graphEmailService = app(GraphEmailService::class);

                        // Prepare email data
                        $viewData = [
                            'task' => $record,
                            'employee' => $employee,
                        ];

                        // Send the email using Graph API
                        $graphEmailService->sendEmail($employee->email, 'New Task Assigned', $viewData);
                    }),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
