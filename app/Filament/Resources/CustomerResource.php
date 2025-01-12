<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CustomerResource\Pages;
use App\Filament\Resources\CustomerResource\RelationManagers;
use App\Models\Customer;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CustomerResource extends Resource
{
    protected static ?string $model = Customer::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\Select::make('user_id')
                ->relationship('user', 'name', fn (Builder $query) => $query->where('role', 'user'))
                ->required()
                ->label('Name')
                ->live()
                ->afterStateUpdated(function ($state, $set) {
                    if ($state) {
                        $user = \App\Models\User::find($state);
                        if ($user) {
                            $set('user_email', $user->email);
                        }
                    }
                }),
            Forms\Components\TextInput::make('phone_number')
                ->label('Phone Number')
                ->required(),
            Forms\Components\TextInput::make('address')
                ->required()
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('user.email')
                    ->label('Email Address')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone_number'),
                Tables\Columns\TextColumn::make('address'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCustomers::route('/'),
            'create' => Pages\CreateCustomer::route('/create'),
            'edit' => Pages\EditCustomer::route('/{record}/edit'),
        ];
    }
}
