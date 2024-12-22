<?php

namespace App\Filament\Resources\CustomerResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ContactsRelationManager extends RelationManager
{
    protected static string $relationship = 'contacts';
    protected static ?string $title = 'Edit UTM Source';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('contact_type')
                ->options([
                    'Primary' => 'Primary',
                    'Other' => 'Other',
                ])
                ->required()->native(false),
                Forms\Components\TextInput::make('name')->required(),
                Forms\Components\TextInput::make('email')->email()->required(),
                Forms\Components\TextInput::make('phone')->required(),
                Forms\Components\Checkbox::make('is_active'),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                TextColumn::make('contact_type')->label('Contact Type')->sortable()->searchable(),
                TextColumn::make('name')->label('Name')->sortable()->searchable(),
                TextColumn::make('email')->label('Email')->sortable()->searchable(),
                TextColumn::make('phone')->label('Phone')->sortable()->searchable(),
                // TextColumn::make('is_active')->label('Active')->sortable()->boolean(),
                TextColumn::make('created_by')->label('Created By')->sortable(),
                TextColumn::make('updated_by')->label('Updated By')->sortable(),
                TextColumn::make('created_at')->label('Created At')->sortable(),
                TextColumn::make('updated_at')->label('Updated At')->sortable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                ->label('Edit')
                ->modalHeading('Add New UTM to Agency'),
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
