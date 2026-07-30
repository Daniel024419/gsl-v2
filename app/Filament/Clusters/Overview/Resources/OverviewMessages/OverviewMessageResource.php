<?php

namespace App\Filament\Clusters\Overview\Resources\OverviewMessages;

use App\Filament\Clusters\Overview\OverviewCluster;
use App\Filament\Clusters\Overview\Resources\OverviewMessages\Pages\ListOverviewMessages;
use App\Filament\Clusters\Overview\Resources\OverviewMessages\Schemas\OverviewMessageForm;
use App\Filament\Clusters\Overview\Resources\OverviewMessages\Tables\OverviewMessagesTable;
use App\Models\OverviewMessage;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class OverviewMessageResource extends Resource
{
    protected static ?string $model = OverviewMessage::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedChatBubbleLeftRight;

    protected static ?string $navigationLabel = 'Messages';

    protected static ?int $navigationSort = 3;

    protected static ?string $cluster = OverviewCluster::class;

    protected static ?string $recordTitleAttribute = 'heading';

    public static function form(Schema $schema): Schema
    {
        return OverviewMessageForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return OverviewMessagesTable::configure($table);
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
            'index' => ListOverviewMessages::route('/'),
        ];
    }
}
