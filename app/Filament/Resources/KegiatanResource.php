<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KegiatanResource\Pages;
Use Illuminate\Support\Facades\Storage;
use App\Models\Kegiatan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Carbon\Carbon;

class KegiatanResource extends Resource
{
    protected static ?string $model = Kegiatan::class;

    protected static ?string $navigationIcon = 'heroicon-s-camera';

    protected static ?string $navigationLabel = 'Kegiatan';

    protected static ?string $navigationGroup = 'Kegiatan & Riset';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_kegiatan')
                    ->columnSpanFull()
                    ->default(null),
                Forms\Components\RichEditor::make('isi_kegiatan')
                    ->label('Isi Kegiatan')->columnSpan(2),
                Forms\Components\FileUpload::make('gambar1')
                    ->directory('images/kegiatan')
                    ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file) {
                        $namaFileBaru = date('Y-m-d') . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                        $namaFileBaru = str_replace('"', '', $namaFileBaru);
                        return $namaFileBaru;
                    }),
                Forms\Components\FileUpload::make('gambar2')
                    ->directory('images/kegiatan')
                    ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file) {
                        $namaFileBaru = date('Y-m-d') . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                        $namaFileBaru = str_replace('"', '', $namaFileBaru);
                        return $namaFileBaru;
                    }),
                Forms\Components\FileUpload::make('gambar3')
                    ->directory('images/kegiatan')
                    ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file) {
                        $namaFileBaru = date('Y-m-d') . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                        $namaFileBaru = str_replace('"', '', $namaFileBaru);
                        return $namaFileBaru;
                    }),
                Forms\Components\FileUpload::make('gambar4')
                    ->directory('images/kegiatan')
                    ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file) {
                        $namaFileBaru = date('Y-m-d') . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                        $namaFileBaru = str_replace('"', '', $namaFileBaru);
                        return $namaFileBaru;
                    }),
                Forms\Components\DateTimePicker::make('tgl_kegiatan'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_kegiatan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('isi_kegiatan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tgl_kegiatan')
                    ->label('Tgl Kegiatan')
                    ->formatStateUsing(fn($state) => Carbon::parse($state)->translatedFormat('d F Y H:i')),
                Tables\Columns\ImageColumn::make('gambar1')
                    ->label('gambar1')
                    ->url(fn($record): ?string => $record->gambar1 ? Storage::url($record->gambar1) : null)
                    ->openUrlInNewTab(),
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
            'index' => Pages\ListKegiatans::route('/'),
            'create' => Pages\CreateKegiatan::route('/create'),
            'edit' => Pages\EditKegiatan::route('/{record}/edit'),
        ];
    }
}
