<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NoticiaResource\Pages;
use App\Models\Noticia;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Grid;
use Filament\Resources\Resource;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;

class NoticiaResource extends Resource
{
    protected static ?string $model = Noticia::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Información de la Noticia')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('titulo')
                                    ->required()
                                    ->maxLength(255)
                                    ->label('Título'),

                                DatePicker::make('fecha_publicacion')
                                    ->label('Fecha de Publicación')
                                    ->placeholder('Selecciona la fecha de publicación'),
                            ]),

                        Select::make('autor')
                            ->label('Autor')
                            ->searchable()
                            ->options(function () {
                                return Noticia::query()
                                    ->select('autor')
                                    ->distinct()
                                    ->pluck('autor', 'autor')
                                    ->toArray();
                            })
                            ->placeholder('Selecciona o busca un autor'),

                        TextInput::make('imagen')
                            ->label('URL de la Imagen')
                            ->url()
                            ->placeholder('https://ejemplo.com/imagen.jpg'),
                    ])
                    ->columns(1), // Una columna para estos campos para mantenerlo organizado

                Section::make('Contenido')
                    ->schema([
                        RichEditor::make('contenido')
                            ->required()
                            ->label('Contenido')
                            ->disableToolbarButtons([
                                'strike',
                                'code',
                            ])
                            ->placeholder('Escribe el contenido aquí...'),
                    ])
                    ->columns(1) // Contenido en una sola columna completa
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('imagen')->label('Imagen')->square(),
                Tables\Columns\TextColumn::make('titulo')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('autor')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('fecha_publicacion')->sortable(),
                Tables\Columns\TextColumn::make('created_at')->dateTime('d-m-Y')->label('Creado'),
                Tables\Columns\TextColumn::make('updated_at')->dateTime('d-m-Y')->label('Actualizado'),
            ])
            ->filters([
                // Puedes agregar filtros aquí
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListNoticias::route('/'),
            'create' => Pages\CreateNoticia::route('/create'),
            'edit' => Pages\EditNoticia::route('/{record}/edit'),
        ];
    }
}
