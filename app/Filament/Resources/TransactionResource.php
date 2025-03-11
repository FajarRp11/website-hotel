<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TransactionResource\Pages;
use App\Filament\Resources\TransactionResource\RelationManagers;
use App\Models\Transaction;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TransactionResource extends Resource
{
    protected static ?string $model = Transaction::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    private static function calculateTotalCost(Get $get, Set $set): void 
    {
        $roomId = $get('room_id');
        $checkInDate = $get('check_in_date');
        $checkOutDate = $get('check_out_date');

        if ($roomId && $checkInDate && $checkOutDate) {
            $room = \App\Models\Room::find($roomId);
            
            if ($room) {
                $checkIn = Carbon::parse($checkInDate);
                $checkOut = Carbon::parse($checkOutDate);
                
                // Pastikan checkout lebih besar dari checkin
                if ($checkIn <= $checkOut) {
                    $numberOfNights = $checkIn->diffInDays($checkOut);
                    
                    // Pastikan minimal 1 malam
                    if ($numberOfNights < 1) {
                        $numberOfNights = 1;
                    }
                    
                    $totalCost = (int)$room->price_per_night * (int)$numberOfNights;
                    $set('total_cost', abs($totalCost));
                } else {
                    $set('total_cost', 0);
                }
            } else {
                $set('total_cost', 0);
            }
        } else {
            $set('total_cost', 0);
        }
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('customer_id')
                    ->relationship(
                        'customer',
                        'id',
                        fn (Builder $query) => $query->whereHas('user')
                    )
                    ->getOptionLabelFromRecordUsing(fn ($record) => $record->user->name)
                    ->searchable(['user.name'])
                    ->preload()
                    ->required()
                    ->label('Customer Name'),
                Forms\Components\Select::make('room_id')
                    ->relationship('room', 'room_number')
                    ->required()
                    ->label('Room Number'),
                Forms\Components\DatePicker::make('check_in_date')
                    ->required()
                    ->live()
                    ->afterStateUpdated(function (Get $get, Set $set) {
                        self::calculateTotalCost($get, $set);
                    }),
                Forms\Components\DatePicker::make('check_out_date')
                    ->required()
                    ->live()
                    ->afterStateUpdated(function (Get $get, Set $set) {
                        self::calculateTotalCost($get, $set);
                    }),
                Forms\Components\Select::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'success' => 'Success',
                        'cancelled' => 'Cancelled',
                        'completed' => 'Completed'
                    ])
                    ->required(),
                Forms\Components\TextInput::make('total_cost')
                    ->required()
                    ->numeric()
                    ->disabled()
                    ->reactive()
                    ->prefix('Rp')
                    ->dehydrated(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('booking_number')
                    ->label('Booking Number')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('customer.user.name')
                    ->label('Customer Name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('room.room_number')
                    ->label('Room Number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('check_in_date')
                    ->date(),
                Tables\Columns\TextColumn::make('check_out_date')
                    ->date(),
                Tables\Columns\TextColumn::make('total_cost')
                    ->numeric()
                    ->formatStateUsing(function ($state) {
                        return 'Rp ' . number_format($state, 0, ',', '.');
                    })
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->formatStateUsing(function ($state) {
                        return ucfirst($state); 
                    })
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'gray',
                        'success' => 'success',
                        'cancelled' => 'danger',
                        'completed' => 'success',
                    })
                    ->icon(fn (string $state): string => match ($state) {
                        'pending' => 'heroicon-m-clock',
                        'success' => 'heroicon-m-check-circle',
                        'cancelled' => 'heroicon-m-x-circle',
                        'completed' => 'heroicon-m-check-circle',
                    }),
            ])
            ->filters([
                
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
            'index' => Pages\ListTransactions::route('/'),
            'create' => Pages\CreateTransaction::route('/create'),
            'edit' => Pages\EditTransaction::route('/{record}/edit'),
        ];
    }
}
