<?php

namespace App\Filament\Resources;

use App\Filament\Resources\IklanResource\Pages;
use App\Models\Iklan;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class IklanResource extends Resource
{
    protected static ?string $model = Iklan::class;
    protected static ?string $navigationIcon = 'heroicon-o-megaphone';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('judul')
                ->required()
                ->label('Judul Iklan'),
            Select::make('jenis')
                ->options([
                    'banner' => 'Banner',
                    'popup' => 'Popup',
                    'lainnya' => 'Lainnya'
                ])
                ->required()
                ->label('Jenis Iklan'),
            TextInput::make('link')
                ->url()
                ->nullable()
                ->label('Target Link'),
            FileUpload::make('gambar')
                ->image()
                ->directory('iklan')
                ->nullable()
                ->label('Foto/GIF Iklan'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('id')->sortable(),
            TextColumn::make('judul')->searchable(),
            TextColumn::make('jenis'),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListIklans::route('/'),
            'create' => Pages\CreateIklan::route('/create'),
            'edit'   => Pages\EditIklan::route('/{record}/edit'),
        ];
    }
}
