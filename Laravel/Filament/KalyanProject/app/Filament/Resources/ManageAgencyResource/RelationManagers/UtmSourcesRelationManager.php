<?php

namespace App\Filament\Resources\ManageAgencyResource\RelationManagers;

use App\Models\UtmSources;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\Textarea;
use Filament\Notifications\Notification;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Actions\Action;

class UtmSourcesRelationManager extends RelationManager
{
    protected static string $relationship = 'utmSources';
    protected static ?string $title = 'Edit UTM Source';
    

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('utm_source')
                    ->maxLength(255)
                    ->label('Enter UTM Source')
                    ->placeholder('UTM Source')
                    ->rules(['required'])
                    ->validationAttribute('UTM Source'), // Custom validation rule
                Forms\Components\TextInput::make('utm_medium')
                    ->label('UTM Medium')
                    ->maxLength(255)
                    ->placeholder('Enter UTM Medium')
                    ->rules(['required'])
                    ->validationAttribute('UTM Medium'), // Custom validation rule
                Forms\Components\TextInput::make('utm_campaign')
                    ->label('UTM Campaign')
                    ->maxLength(255)
                    ->placeholder('Enter UTM Campaign')
                    ->rules(['required'])
                    ->validationAttribute('UTM Campaign'), // Custom validation rule
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('utm_source')
            ->columns([
                Tables\Columns\TextColumn::make('utm_source')->label('UTM Source')->searchable(),
                Tables\Columns\TextColumn::make('utm_medium')->label('UTM Medium')->searchable(),
                Tables\Columns\TextColumn::make('utm_campaign')->label('UTM Campaign')->searchable(),
                Tables\Columns\TextColumn::make('comments')->label('Comments'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->label('Add New UTM')
                    ->modalHeading('Add New UTM to Agency')
                    ->modalFooterActions([
                        Action::make('submit')
                            ->label('Create')
                            ->button()
                            ->submit('create')
                            ->extraAttributes([
                                'style' => '
                                    background: #E07E12; 
                                    color: white; 
                                    padding: 8px 40px; 
                                    border-radius: 4px; 
                                    transition: background-color 0.3s ease-in-out, opacity 0.3s ease-in-out;
                                ',
                                'onmouseover' => "this.style.background='white'; this.style.opacity='0.9';",
                                'onmouseout' => "this.style.background='#E07E12'; this.style.opacity='1';"
                            ])
                    ])
            ])
            ->actions([
                Tables\Actions\EditAction::make()->modalHeading('Edit UTM Source')
                ->modalFooterActions([
                    Action::make('submit')
                        ->label('Update')
                        ->button()
                        ->submit('Update')
                        ->extraAttributes(['style' => 'margin-left: auto;'])
                ]),
                Action::make('block')
                    ->label(fn ($record) => $record->blocked_status ? 'Blocked' : 'Block')
                    ->icon('heroicon-s-no-symbol')
                    ->color(fn ($record) => $record->blocked_status ? 'primary' : 'danger')
                    ->disabled(fn ($record) => $record->blocked_status)
                    ->requiresConfirmation()
                    ->modalIcon('heroicon-s-no-symbol')
                    ->modalSubmitActionLabel('Block')
                    ->modalDescription('Do you want to block this UTM Campaign?')
                    ->form([
                        Textarea::make('comments')
                            ->label('Comments')
                            ->placeholder('Type the reason here...')
                            ->extraAttributes(['style' => 'height: 100px;'])
                            ->required(),
                    ])
                    ->action(function (array $data, $record) {
                        $record->update([
                            'comments' => $data['comments'],
                            'blocked_by' => auth()->id(),
                            'blocked_status' => true,
                        ]);

                        Notification::make()
                            ->title('UTM Details Blocked Successfully')
                            ->icon('heroicon-s-check-badge')
                            ->success()
                            ->send();
                    })
            ])
            ->bulkActions([

            ]);
    }
}
