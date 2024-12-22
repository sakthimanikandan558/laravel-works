<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class ListUsersWidget extends CollapsibleTableWidget
{
    public function table(Table $table): Table
    {
        return $table
            ->query(User::query()) // Query to fetch users from the User model
            ->headerActions([
                Tables\Actions\Action::make('create')
                    ->label('Create User')
                    ->url(route('users.create')), // Route for the 'Create User' action
            ])
            ->actions([
                Tables\Actions\Action::make('view')
                    ->label('View User')
                    ->url(fn (User $record) => route('users.show', $record)), // Route for the 'View User' action
            ])
            ->columns([
                TextColumn::make('id')->label('ID')->sortable(),
                TextColumn::make('name')->label('Name')->sortable()->searchable(),
                TextColumn::make('email')->label('Email')->sortable()->searchable(),
            ])
            ->heading('Users');
    }
}


