<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PatientResource\Pages;
use App\Filament\Resources\PatientResource\RelationManagers;
use App\Models\Patient;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PatientResource extends Resource
{
    protected static ?string $model = Patient::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $label = 'Paciente';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nome')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('cpf')
                    ->label('CPF')
                    ->required()
                    ->maxLength(20),
                Forms\Components\TextInput::make('sus_card')
                    ->label('Cartão SUS')
                    ->required()
                    ->maxLength(100),
                Forms\Components\TextInput::make('phone')
                    ->label('Telefone')
                    ->tel()
                    ->required()
                    ->maxLength(50),
                Forms\Components\Radio::make('sex')
                    ->options(['m'=>'Masculino','f'=>'Feminino'])->label('Sexo')
                    ->required(),
                Forms\Components\TextInput::make('address')
                    ->label('Endereço')
                    ->required()
                    ->maxLength(50),
                Forms\Components\Select::make('ubs_id')
                    ->relationship('ubs','name',)
                    ->preload()
                    ->required(),
                Forms\Components\Toggle::make('hypertensive')
                    ->label('Hipertenso?')
                    ->required(),
                Forms\Components\Toggle::make('diabetic')
                    ->label('Diabético?')
                    ->required(),
                Forms\Components\Toggle::make('pregnant')
                    ->label('Gestante?')
                    ->required(),
                Forms\Components\Toggle::make('cancer')
                    ->label('Teve/Tem Cancer?')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nome')
                    ->searchable(),
                Tables\Columns\TextColumn::make('cpf')
                    ->label('CPF')
                    ->searchable(),
                Tables\Columns\TextColumn::make('sus_card')
                    ->label('Cartão do SUS')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->label('Telefone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('sex')
                    ->label('Sexo')
                    ->searchable(),
                Tables\Columns\TextColumn::make('address')
                    ->label('Endereço')
                    ->searchable(),
                Tables\Columns\IconColumn::make('hypertensive')
                    ->label('Hipertenso')
                    ->boolean(),
                Tables\Columns\IconColumn::make('diabetic')
                    ->label('Diabético')
                    ->boolean(),
                Tables\Columns\IconColumn::make('pregnant')
                    ->label('Gestante')
                    ->boolean(),
                Tables\Columns\IconColumn::make('cancer')
                    ->label('Teve/Tem Cancer')
                    ->boolean(),
//                Tables\Columns\TextColumn::make('created_at')
//                    ->dateTime()
//                    ->sortable()
//                    ->toggleable(isToggledHiddenByDefault: true),
//                Tables\Columns\TextColumn::make('updated_at')
//                    ->dateTime()
//                    ->sortable()
//                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListPatients::route('/'),
            'create' => Pages\CreatePatient::route('/create'),
            'edit' => Pages\EditPatient::route('/{record}/edit'),
        ];
    }
}
