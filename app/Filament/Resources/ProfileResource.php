<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProfileResource\Pages;
use App\Filament\Resources\ProfileResource\RelationManagers;
use App\Models\Profile;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class ProfileResource extends Resource
{
    protected static ?string $model = Profile::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office';

    protected static ?string $navigationLabel = 'Profil';

    protected static ?string $navigationGroup = 'Master';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_profil')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('tahun')
                    ->numeric()
                    ->default(null),
                Forms\Components\TextInput::make('nama_kontak_profil')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('no_kontak_profil')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\Textarea::make('alamat_profil')
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('latar_belakang')
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('tujuan')
                    ->columnSpanFull(),
                Forms\Components\RichEditor::make('visi_misi')
                    ->label('Visi Misi')->columnSpan(2),
                Forms\Components\Textarea::make('motto')
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('logo')
                    ->directory('images/profil')
                    ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file) {
                        $namaFileBaru = date('Y-m-d') . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                        $namaFileBaru = str_replace('"', '', $namaFileBaru);
                        return $namaFileBaru;
                    }),
                Forms\Components\FileUpload::make('banner')
                    ->directory('video/profil')
                    ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file) {
                        $namaFileBaru = date('Y-m-d') . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                        $namaFileBaru = str_replace('"', '', $namaFileBaru);
                        return $namaFileBaru;
                    }),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_profil')
                    ->searchable(),
                Tables\Columns\TextColumn::make('alamat_profil')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nama_kontak_profil')
                    ->label('Nama Kontak'),
                Tables\Columns\TextColumn::make('no_kontak_profil')
                    ->label('No Kontak'),
                Tables\Columns\ImageColumn::make('logo')
                    ->disk('public')
                    ->url(fn($record) => asset('storage/' . $record->logo))->openUrlInNewTab()
                    ->label('logo'),
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
            'index' => Pages\ListProfiles::route('/'),
            'create' => Pages\CreateProfile::route('/create'),
            'edit' => Pages\EditProfile::route('/{record}/edit'),
        ];
    }
}
