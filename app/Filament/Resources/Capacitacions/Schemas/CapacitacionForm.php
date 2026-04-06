<?php

namespace App\Filament\Resources\Capacitacions\Schemas;

use App\Enums\CapacitacionStatus;
use App\Models\Municipio;
use App\Models\Parroquia;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class CapacitacionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Section::make("Registrar Capacitacion")
                    ->description("Capacitación:")
                    ->schema([
                        TextInput::make('titulo')
                            ->required(),
                        Textarea::make('descripcion')
                            ->required()
                            ->columnSpanFull(),
                        DatePicker::make('fecha_inicio')
                            ->default(now())
                            ->required()
                            ->live()
                            ->native(false),
                        DatePicker::make('fecha_final')
                            ->default(now())
                            ->required()
                            ->after('fecha_inicio')
                            ->minDate(fn ($get) => $get('fecha_inicio'))
                            ->native(false),
                        Select::make('status')
                            ->options(CapacitacionStatus::class)
                            ->enum(CapacitacionStatus::class)
                            ->required()
                            ->columnSpan(2),
                        Select::make('estado_id')
                            ->label("Estado")
                            ->live()
                            ->searchable()
                            ->preload()
                            ->relationship('estado', 'nombre_estado')
                            ->required()
                            ->afterStateUpdated(function (Get $get, Set $set,  $livewire) {

                                $livewire->dispatch('log-to-console', message: [
                                    'selected_state' => $get('estado_id'),
                                    'time' => now()->toTimeString(),
                                ]);
                                ray($get('estado_id'))->label('Selected State ID');

                                $set('municipio_id', null);
                                $set('parroquia_id', null);
                            }),
                            
                        Select::make('municipio_id')
                            ->label("Municipio")
                            ->live()
                            ->searchable()
                            ->preload()
                            ->options(function (Get $get): array { 
                            
                            return Municipio::where('estado_id',  $get('estado_id'))
                                ->pluck('nombre_municipio', 'municipio_id')
                                ->toArray();
                                
                            })->afterStateUpdated(function (Get $get, Set $set,  $livewire) { 
                                $livewire->dispatch('log-to-console', message: [
                                    'selected_municipio' => $get('municipio_id'),
                                    'time' => now()->toTimeString(),
                                ]);
                                ray($get('municipio_id'))->label('Selected Municipio ID');
                                $set('parroquia_id', null);
                            }),
                        Select::make('parroquia_id')
                            ->label("Parroquia")
                            ->live()
                            ->searchable()
                            ->preload()
                            ->options(function (Get $get): array {

                                return Parroquia::where('estado_id', $get('estado_id'))
                                    ->where('municipio_id', $get('municipio_id'))
                                    ->pluck('nombre_parroquia', 'parroquia_id')
                                    ->toArray();
                                
                            })
                    ])->columns(2)   
            ]);
    }
}
