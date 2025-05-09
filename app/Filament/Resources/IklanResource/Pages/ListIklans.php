<?php

namespace App\Filament\Resources\IklanResource\Pages;

use App\Filament\Resources\IklanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListIklans extends ListRecords
{
    protected static string $resource = IklanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
