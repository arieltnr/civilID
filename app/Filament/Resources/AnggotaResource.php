<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AnggotaResource\Pages;
Use Illuminate\Support\Facades\Storage;
use App\Models\Anggota;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class AnggotaResource extends Resource
{
    protected static ?string $model = Anggota::class;

    protected static ?string $navigationIcon = 'heroicon-c-users';

    protected static ?string $navigationLabel = 'Anggota';

    protected static ?string $navigationGroup = 'Master';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_anggota')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nomorinduk')
                    ->maxLength(255)
                    ->default(null),
                    Forms\Components\TextInput::make('jabatan')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\FileUpload::make('foto')
                    ->directory('images/anggota')
                    ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file) {
                        $namaFileBaru = date('Y-m-d') . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                        $namaFileBaru = str_replace('"', '', $namaFileBaru);
                        return $namaFileBaru;
                    }),
                Forms\Components\Toggle::make('status')
                    ->required()
                    ->label('Status Aktif')
                    ->default(true)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_anggota')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nomorinduk')
                    ->searchable(),
                Tables\Columns\TextColumn::make('jabatan')
                    ->label('Kontak'),
                Tables\Columns\ImageColumn::make('foto')
                    ->label('foto')
                    ->url(fn($record): ?string => $record->foto ? Storage::url($record->foto) : null)
                    ->openUrlInNewTab(),
                Tables\Columns\IconColumn::make('status')->boolean(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListAnggotas::route('/'),
            'create' => Pages\CreateAnggota::route('/create'),
            'edit' => Pages\EditAnggota::route('/{record}/edit'),
        ];
    }
}
