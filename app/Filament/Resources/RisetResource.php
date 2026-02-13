<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RisetResource\Pages;
use App\Filament\Resources\RisetResource\RelationManagers;
use App\Models\Riset;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RisetResource extends Resource
{
    protected static ?string $model = Riset::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    protected static ?string $navigationLabel = 'Riset';

    protected static ?string $navigationGroup = 'Kegiatan & Riset';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('judul')
                    ->required()
                    ->columnSpan(2)
                    ->maxLength(255),
                Forms\Components\RichEditor::make('hasil_riset')
                    ->label('Hasil Riset')->columnSpan(2),
                Forms\Components\FileUpload::make('gambar1')
                    ->directory('images/riset')
                    ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file) {
                        $namaFileBaru = date('Y-m-d') . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                        return $namaFileBaru;
                }),
            
                Forms\Components\FileUpload::make('gambar2')
                    ->directory('images/riset')
                    ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file) {
                        $namaFileBaru = date('Y-m-d') . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                        $namaFileBaru = str_replace('"', '', $namaFileBaru);
                        return $namaFileBaru;
                    }),
                Forms\Components\FileUpload::make('gambar3')
                    ->directory('images/riset')
                    ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file) {
                        $namaFileBaru = date('Y-m-d') . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                        $namaFileBaru = str_replace('"', '', $namaFileBaru);
                        return $namaFileBaru;
                    }),
                Forms\Components\FileUpload::make('gambar4')
                    ->directory('images/riset')
                    ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file) {
                        $namaFileBaru = date('Y-m-d') . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                        $namaFileBaru = str_replace('"', '', $namaFileBaru);
                        return $namaFileBaru;
                    }),
                Forms\Components\DateTimePicker::make('tgl_riset'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('judul')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tgl_riset')
                    ->label('Tgl Riset')
                    ->formatStateUsing(fn($state) => Carbon::parse($state)->translatedFormat('d F Y H:i')),
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
            'index' => Pages\ListRisets::route('/'),
            'create' => Pages\CreateRiset::route('/create'),
            'edit' => Pages\EditRiset::route('/{record}/edit'),
        ];
    }
}
