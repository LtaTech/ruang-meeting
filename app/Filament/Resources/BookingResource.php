<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookingResource\Pages;
use App\Filament\Resources\BookingResource\RelationManagers;
use App\Models\Booking;
use App\Models\Room;
use Filament\Forms;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BookingResource extends Resource
{
    protected static ?string $model = Booking::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('event_name')
                    ->columnSpan(2)
                    ->required(),
                Select::make('room_id')
                    ->searchable()
                    ->relationship('room', 'name')
                    ->preload()
                    ->getOptionLabelFromRecordUsing(fn (Room $record) => "{$record->name} ({$record->branch->name})")
                    ->columnSpan(2)
                    ->required(),
                TextInput::make('guest_name')
                    ->required(),
                TextInput::make('guest_email')
                    ->required(),
                DateTimePicker::make('check_in')
                    ->required(),
                DateTimePicker::make('check_out')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('event_name'),
                TextColumn::make('room.name'),
                TextColumn::make('room.branch.name'),
                TextColumn::make('check_in'),
                TextColumn::make('check_out'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListBookings::route('/'),
            // 'create' => Pages\CreateBooking::route('/create'),
            // 'edit' => Pages\EditBooking::route('/{record}/edit'),
        ];
    }
}
