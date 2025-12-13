<?php

namespace App\Filament\Resources\KegiatanResource\Pages;

use App\Filament\Resources\KegiatanResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;

class CreateKegiatan extends CreateRecord
{
    protected static string $resource = KegiatanResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Berhasil')
            ->body('Kegiatan Berhasil dibuat.');
    }
}
