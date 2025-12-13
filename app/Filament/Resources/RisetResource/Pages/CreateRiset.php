<?php

namespace App\Filament\Resources\RisetResource\Pages;

use App\Filament\Resources\RisetResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;

class CreateRiset extends CreateRecord
{
    protected static string $resource = RisetResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Berhasil')
            ->body('Riset Berhasil dibuat.');
    }
}
