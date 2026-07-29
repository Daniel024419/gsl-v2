<?php

namespace App\Filament\Clusters\Management\Resources\Roles\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class RoleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Role / Title')
                    ->helperText('e.g. "Justice of the Supreme Court" or "Finance & Resource Management". Used as a selectable option across Leadership, Governing Body, Enrollment Committee, and Administration.')
                    ->unique(ignoreRecord: true)
                    ->required(),
            ]);
    }
}
