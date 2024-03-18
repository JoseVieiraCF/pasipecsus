<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EmployeeResource\Pages;
use App\Filament\Resources\EmployeeResource\RelationManagers;
use App\Models\Employee;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EmployeeResource extends Resource
{
    protected static ?string $model = Employee::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $label = 'Funcionário';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
//                Forms\Components\TextInput::make('job_role_id')
//                    ->required()
//                    ->numeric(),
                Forms\Components\Select::make('job_role_id')->relationship('job_role_id','name')->label('Função'),
                Forms\Components\TextInput::make('name')
                    ->label('Nome')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('cpf')
                    ->required()
                    ->maxLength(20)->label('CPF'),
                Forms\Components\DatePicker::make('birthday')
                    ->required()->label('Data de Nascimento'),
//                Forms\Components\TextInput::make('sex')
//                    ->required()
//                    ->maxLength(2),
                Forms\Components\Radio::make('sex')
                    ->required()->options(['m'=>'Masculino','f'=>'Feminino'])->label('Sexo'),
                Forms\Components\TextInput::make('sus_card')
                    ->required()
                    ->maxLength(50)->label('Cartão SUS'),
                Forms\Components\TextInput::make('phone')
                    ->tel()
                    ->required()
                    ->maxLength(14)->label('Telefone'),
                Forms\Components\DatePicker::make('admission')
                    ->required()->label('Data de Admissão'),
                Forms\Components\TextInput::make('address')
                    ->required()
                    ->maxLength(255)->label('Endereço'),
                Forms\Components\Select::make('ubs_id')->relationship('ubs','name',)->preload()->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('job_role_id')
                    ->label('Função')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->label('Nome')
                    ->searchable(),
                Tables\Columns\TextColumn::make('cpf')
                    ->label('CPF')
                    ->searchable(),
                Tables\Columns\TextColumn::make('birthday')
                    ->label('Data de Nascimento')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('sex')
                    ->label('Sexo')
                    ->searchable(),
                Tables\Columns\TextColumn::make('sus_card')
                    ->label('Cartão SUS')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->label('Telefone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('admission')
                    ->label('Data de Admissão')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('address')
                    ->label('Endereço')
                    ->searchable(),
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
            'index' => Pages\ListEmployees::route('/'),
            'create' => Pages\CreateEmployee::route('/create'),
            'edit' => Pages\EditEmployee::route('/{record}/edit'),
        ];
    }
}
