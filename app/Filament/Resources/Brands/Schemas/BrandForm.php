<?php

namespace App\Filament\Resources\Brands\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class BrandForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nama Brand')
                    ->required()
                    ->maxLength(100),

                TextInput::make('slug')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(50),

                TextInput::make('domain')
                    ->label('Domain')
                    ->unique(ignoreRecord: true)
                    ->maxLength(255),

                FileUpload::make('logo')
                    ->image()
                    ->directory('brands/logos')
                    ->maxSize(1024),

                FileUpload::make('favicon')
                    ->image()
                    ->directory('brands/favicons')
                    ->maxSize(512),

                KeyValue::make('theme_settings')
                    ->label('Theme Settings')
                    ->keyLabel('Key')
                    ->valueLabel('Value')
                    ->columnSpanFull(),

                KeyValue::make('business_settings')
                    ->label('Business Settings')
                    ->keyLabel('Key')
                    ->valueLabel('Value')
                    ->columnSpanFull(),

                Repeater::make('operating_hours')
                    ->label('Jam Operasional')
                    ->schema([
                        Select::make('day')
                            ->label('Hari')
                            ->options([
                                'monday' => 'Senin',
                                'tuesday' => 'Selasa',
                                'wednesday' => 'Rabu',
                                'thursday' => 'Kamis',
                                'friday' => 'Jumat',
                                'saturday' => 'Sabtu',
                                'sunday' => 'Minggu',
                            ])
                            ->required(),

                        TimePicker::make('open_time')
                            ->label('Jam Buka')
                            ->seconds(false)
                            ->required(),

                        TimePicker::make('close_time')
                            ->label('Jam Tutup')
                            ->seconds(false)
                            ->required(),
                    ])
                    ->columns(3)
                    ->defaultItems(7)
                    ->columnSpanFull(),

                TextInput::make('currency')
                    ->label('Mata Uang')
                    ->default('IDR')
                    ->maxLength(3),

                TextInput::make('timezone')
                    ->default('Asia/Jakarta')
                    ->maxLength(50),

                Toggle::make('is_active')
                    ->label('Aktif')
                    ->default(true),
            ]);
    }
}
