<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventResource\Pages;
use App\Filament\Resources\EventResource\RelationManagers;
use App\Filament\Resources\PostResource\RelationManagers\CommentsRelationManager;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\Select;
use App\Models\Event;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Columns\CheckboxColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;


class EventResource extends Resource
{
    protected static ?string $model = Event::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $modelLabel = 'Events';
    protected static ?string $pluralModelLabel = 'Events';
    protected static ?string $navigationGroup = 'Event';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Main Content')->schema([
                    TextInput::make('title')
                    ->live()
                    ->required()->minLength(1)->MaxLength(150)
                    ->afterStateUpdated(function(string $operation, $state, Forms\Set $set){
                        if ($operation == 'edit'){
                            return;
                        }
                        $set('slug', Str::slug($state));
                    }),
                    TextInput::make('slug')->required()->minLength(1)->unique(ignoreRecord: false)->maxLength(150),
                    RichEditor::make('description')
                            ->required()
                            ->columnSpanFull()
                            ->disableToolbarButtons([
                                'attachFiles',
                            ])
                ])->columns(2),
                Section::make('Meta')->schema([
                    FileUpload::make('image')->image()->directory('events/thumbnails')->deletable(false),
                    DatePicker::make('start_date')
                    ->required(),
                    DatePicker::make('end_date')
                    ->required(),
                    TimePicker::make('start_time')
                    ->required(),
                    Select::make('country_id')
                    ->relationship('country', 'name')
                    ->required(),
                    Select::make('city_id')
                    ->relationship('city', 'name')
                    ->required(),
                    TextInput::make('address')
                    ->required(),
                    // TextInput::make('num_tickets')
                    // ->required()
                    // ->numeric(),
                    Select::make('user_id')
                            ->relationship('author', 'name')
                            ->searchable()
                            ->required(),
                    Select::make('tag')
                            ->relationship('tags', 'name')
                            ->required(),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                    ImageColumn::make('image'),
                    TextColumn::make('title')
                    ->searchable(),
                    TextColumn::make('start_date')
                    ->date()
                    ->sortable(),
                    TextColumn::make('end_date')
                    ->date()
                    ->sortable(),
                    TextColumn::make('start_time'),
                    TextColumn::make('address')
                    ->searchable(),
                    TextColumn::make('num_tickets')
                    ->searchable(),
                    TextColumn::make('country.name')
                    ->numeric()
                    ->sortable(),
                    TextColumn::make('city.name')
                    ->numeric()
                    ->sortable(),
                    TextColumn::make('author.name')
                    ->searchable()
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
            'index' => Pages\ListEvents::route('/'),
            'create' => Pages\CreateEvent::route('/create'),
            'edit' => Pages\EditEvent::route('/{record}/edit'),
        ];
    }
}
