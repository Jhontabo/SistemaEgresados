<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OfertaLaboralResource\Pages;
use App\Filament\Resources\OfertaLaboralResource\RelationManagers;
use App\Models\OfertaLaboral;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\DateColumn;



class OfertaLaboralResource extends Resource
{
    protected static ?string $model = OfertaLaboral::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('titulo')->required(),
                Textarea::make('descripcion')->required(),
                TextInput::make('empresa')->required(),
                TextInput::make('ubicacion')->required(),
                DatePicker::make('fecha_publicacion')->required(),
                TextInput::make('salario')->numeric()->label('Salario'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('titulo')->sortable()->searchable(),
                TextColumn::make('empresa')->sortable()->searchable(),
                TextColumn::make('ubicacion')->sortable(),
                TextColumn::make('fecha_publicacion')->date()->sortable(),
                TextColumn::make('salario')->money('usd'),
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
            'index' => Pages\ListOfertaLaborals::route('/'),
            'create' => Pages\CreateOfertaLaboral::route('/create'),
            'edit' => Pages\EditOfertaLaboral::route('/{record}/edit'),
        ];
    }
}
