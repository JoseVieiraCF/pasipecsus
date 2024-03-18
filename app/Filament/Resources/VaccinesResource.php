<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VaccinesResource\Pages;
use App\Filament\Resources\VaccinesResource\RelationManagers;
use App\Models\Vaccines;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VaccinesResource extends Resource
{
    protected static ?string $model = Vaccines::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nome')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('date')
                    ->label('Data')
                    ->required(),
                Forms\Components\Select::make('patient_id')->label('Paciente')->relationship('patient','name')->preload(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nome')
                    ->searchable(),
                Tables\Columns\TextColumn::make('date')
                    ->label('Data')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('patient.name')
                    ->label('Paciente')

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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListVaccines::route('/'),
            'create' => Pages\CreateVaccines::route('/create'),
            'edit' => Pages\EditVaccines::route('/{record}/edit'),
        ];
    }
}
