<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FilmResource\Pages;
use App\Models\Film;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;  // Pastikan pake ini, bukan Filament\Resources\Table
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;

class FilmResource extends Resource
{
    protected static ?string $model = Film::class;

    protected static ?string $navigationIcon = 'heroicon-o-film';
    
    protected static ?string $navigationLabel = 'Films';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    FileUpload::make('thumbnail')
                        ->label('Thumbnail')
                        ->image()
                        ->required(),
                    TextInput::make('judul')
                        ->label('Judul Film')
                        ->required()
                        ->maxLength(255),
                    TextInput::make('rating')
                        ->numeric()
                        ->minValue(0)
                        ->maxValue(10)
                        ->step(0.1)
                        ->label('Rating'),
                    Select::make('tipe')
                        ->label('Tipe')
                        ->options([
                            'single' => 'Single',
                            'series' => 'Series',
                        ])
                        ->required(),
                    TextInput::make('durasi')
                        ->label('Durasi')
                        ->placeholder('Contoh: 120 Menit'),
                    TextInput::make('kualitas')
                        ->label('Kualitas')
                        ->placeholder('Contoh: HDRip, WebDL'),
                    TextInput::make('genre')
                        ->label('Genre')
                        ->placeholder('Contoh: Action, Drama'),
                    TextInput::make('trailer_link')
                        ->label('Link Trailer')
                        ->url(),
                    Repeater::make('server_backup')
                        ->label('Server Backup (Streaming)')
                        ->schema([
                            TextInput::make('server')
                                ->label('Nama Server')
                                ->required(),
                            TextInput::make('link')
                                ->label('Link Streaming')
                                ->required()
                                ->url(),
                        ])
                        ->collapsible()
                        ->columns(2)
                        ->defaultItems(1)
                        ->createItemButtonLabel('Tambah Server'),
                    TextInput::make('embed_link')
                        ->label('Embed Link')
                        ->url(),
                    Textarea::make('sinopsis')
                        ->label('Sinopsis')
                        ->rows(5),
                    TextInput::make('tahun')
                        ->label('Tahun')
                        ->numeric()
                        ->minValue(1800)
                        ->maxValue(date('Y')),
                    DatePicker::make('tanggal_rilis')
                        ->label('Tanggal Rilis'),
                    Repeater::make('download_links')
                        ->label('Download Links')
                        ->schema([
                            TextInput::make('label')
                                ->label('Label')
                                ->required(),
                            TextInput::make('link')
                                ->label('Link Download')
                                ->required()
                                ->url(),
                        ])
                        ->collapsible()
                        ->columns(2)
                        ->defaultItems(1)
                        ->createItemButtonLabel('Tambah Download Link'),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable(),
                TextColumn::make('judul')->searchable(),
                TextColumn::make('rating')->sortable(),
                TextColumn::make('tipe')->label('Tipe'),
                TextColumn::make('tahun')->sortable(),
                TextColumn::make('tanggal_rilis')->date(),
            ])
            ->filters([
                // Tambahkan filter sesuai kebutuhan
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListFilms::route('/'),
            'create' => Pages\CreateFilm::route('/create'),
            'edit'   => Pages\EditFilm::route('/{record}/edit'),
        ];
    }
}
