<?php

namespace App\Filament\Resources;

use App\Models\Tag;
use Filament\Forms;
use App\Models\Task;
use App\Models\User;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Forms\Components\NumberInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\TaskResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\TaskResource\RelationManagers;

class TaskResource extends Resource
{
    protected static ?string $model = Task::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        // Fetch the users from the database and create an options array
        $users = User::all();

        $userOptions = [];
        foreach ($users as $user) {
            $userOptions[$user->id] = $user->name;
        }

        // Fetch the tags from the database and create an options array
        $tags = Tag::all();

        $tagOptions = [];
        foreach ($tags as $tag) {
            $tagOptions[$tag->id] = $tag->name;
        }

        return $form
            ->schema([
                Forms\Components\TextInput::make('title'),
                Forms\Components\TextInput::make('description'),
                Forms\Components\Select::make('status')->options([
                    'Open' => 'Open',
                    'In Progress' => 'In Progress',
                    'In Review' => 'In Review',
                    'Accepted' => 'Accepted',
                    'Rejected' => 'Rejected',
                    'Pending' => 'Pending'
                ]),
                Forms\Components\Select::make('owner_id')->options($userOptions),
                Forms\Components\Select::make('assignee_id')->options($userOptions),
                Forms\Components\Select::make('tags')
                ->multiple()
                ->options($tagOptions)
                ->relationship('tags', 'name')
            ]);
    }

        protected function apply(Builder $query, $value)
        {
            $query->whereHas('tags', function (Builder $query) use ($value) {
                $query->whereIn('task_tag.tag_id', $value);
            });
        }


    public static function table(Table $table): Table
    {
        // Fetch the tags from the database and create an options array
        $tags = Tag::all();

        $tagOptions = [];
        foreach ($tags as $tag) {
            $tagOptions[$tag->id] = $tag->name;
        }

        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id'),
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('description'),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('owner_id'),
                Tables\Columns\TextColumn::make('tags.name')
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('assignee_id')
                ->multiple()
                    ->options(function () {
                        // Fetch the users from the database and create an options array
                        $users = User::all();

                        $userOptions = [];
                        foreach ($users as $user) {
                            $userOptions[$user->id] = $user->name;
                        }

                        return $userOptions;
                    })
                    ->label('Assignee')
                    ->placeholder('Filter by Assignee'), // Change 'Filter by Owner' to 'Filter by Assignee'
                    Tables\Filters\SelectFilter::make('status')
                    ->multiple()
                    ->options([
                        'Open' => 'Open',
                        'In Progress' => 'In Progress',
                        'In Review' => 'In Review',
                        'Accepted' => 'Accepted',
                        'Rejected' => 'Rejected',
                        'Pending' => 'Pending',
                    ])
                    ->label('Status')
                    ->placeholder('Filter by Status'),
                    Tables\Filters\SelectFilter::make('tag_id')
                        ->multiple()
                        ->options($tagOptions)
                        ->label('Tags')
                        ->placeholder('Filter by Tags')
                        ->relationship('tags', 'name')
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
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
            'index' => Pages\ListTasks::route('/'),
            'create' => Pages\CreateTask::route('/create'),
            'edit' => Pages\EditTask::route('/{record}/edit'),
        ];
    }
}
