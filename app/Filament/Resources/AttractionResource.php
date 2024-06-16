<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AttractionResource\Pages;
use App\Filament\Resources\AttractionResource\RelationManagers;
use App\Models\Attraction;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AttractionResource extends Resource
{
    protected static ?string $model = Attraction::class;
    protected static ?string $navigationGroup = 'Destinations and Attractions';
    protected static ?string $navigationIcon = 'heroicon-o-flag';
    protected static  ?string $recordTitleAttribute = 'name';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('destination_id')
                    ->relationship('destination', 'label'),
                Forms\Components\Select::make('guide_id')
                    ->relationship('guide', 'label'),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('type')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('average_time_visit')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('average_cost_visit')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('description')
                    ->nullable()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('type')
                    ->sortable(),
                Tables\Columns\TextColumn::make('average_cost_visit'),
                Tables\Columns\TextColumn::make('average_time_visit'),
                Tables\Columns\TextColumn::make('description'),
                Tables\Columns\TextColumn::make('destination.label')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('guide.label')
                    ->numeric()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListAttractions::route('/'),
            'create' => Pages\CreateAttraction::route('/create'),
            'edit' => Pages\EditAttraction::route('/{record}/edit'),
        ];
    }
}
