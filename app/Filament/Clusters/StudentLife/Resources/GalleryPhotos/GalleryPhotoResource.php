<?php

namespace App\Filament\Clusters\StudentLife\Resources\GalleryPhotos;

use App\Filament\Clusters\StudentLife\Resources\GalleryPhotos\Pages\ListGalleryPhotos;
use App\Filament\Clusters\StudentLife\Resources\GalleryPhotos\Schemas\GalleryPhotoForm;
use App\Filament\Clusters\StudentLife\Resources\GalleryPhotos\Tables\GalleryPhotosTable;
use App\Filament\Clusters\StudentLife\StudentLifeCluster;
use App\Models\GalleryPhoto;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class GalleryPhotoResource extends Resource
{
    protected static ?string $model = GalleryPhoto::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedPhoto;

    protected static ?string $navigationLabel = 'Gallery Photos';

    protected static ?int $navigationSort = 1;

    protected static ?string $cluster = StudentLifeCluster::class;

    protected static ?string $recordTitleAttribute = 'caption';

    public static function form(Schema $schema): Schema
    {
        return GalleryPhotoForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return GalleryPhotosTable::configure($table);
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
            'index' => ListGalleryPhotos::route('/'),
        ];
    }
}
