<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RoomResource\Pages;
use App\Filament\Resources\RoomResource\RelationManagers;
use App\Models\Room;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RoomResource extends Resource
{
    protected static ?string $model = Room::class;

    protected static ?string $navigationIcon = 'heroicon-o-home-modern';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('room_number')
                    ->required()
                    ->numeric(),
                Forms\Components\Select::make('room_type')
                    ->options([
                        'single' => 'Single',
                        'double' => 'Double',
                        'suite' => 'Suite'
                    ])
                    ->required(),
                Forms\Components\TextInput::make('price_per_night')
                ->required(),
                Forms\Components\Select::make('room_status')
                    ->options([
                        'available' => 'Available',
                        'booked' => 'Booked',
                        'maintenance' => 'Maintenance'
                    ])
                    ->required(),
                Forms\Components\TextInput::make('description')
                        ->maxLength(65535)
                        ->columnSpanFull(),
                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->required(),
                Forms\Components\Select::make('facility_id')
                    ->relationship('facilities', 'name')
                    ->multiple()
                    ->preload()
                    ->searchable()
                    ->label('Facilities'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('room_number')
                    ->numeric()
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('price_per_night')
                    ->numeric()
                    ->sortable()
                    ->formatStateUsing(function ($state) {
                        return 'Rp ' . number_format($state, 0, ',', '.');
                    }),
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('room_type')
                    ->formatStateUsing(function ($state) {
                        return ucfirst($state);
                    }),
                Tables\Columns\TextColumn::make('room_status')
                    ->badge()
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'available' => 'primary',
                        'booked' => 'success',
                        'maintenance' => 'danger',
                    })
                    ->icon(fn (string $state): string => match ($state) {
                        'available' => 'heroicon-m-check-badge',
                        'booked' => 'heroicon-m-sparkles',
                        'maintenance' => 'heroicon-m-exclamation-triangle',
                    })
                    ->formatStateUsing(function ($state) {
                        return ucfirst($state);
                    }),
                Tables\Columns\TextColumn::make('description')
                    ->placeholder('No description'),
                Tables\Columns\TextColumn::make('facilities.name') 
                    ->listWithLineBreaks()
                    ->bulleted()
                    ->placeholder('No Facilities'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListRooms::route('/'),
            'create' => Pages\CreateRoom::route('/create'),
            'edit' => Pages\EditRoom::route('/{record}/edit'),
        ];
    }
}
