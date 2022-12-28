<?php

namespace App\Http\Livewire;

use App\Exports\CategoriesExport;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;
use Maatwebsite\Excel\Facades\Excel;

use App\Models\Category;

class CategoriesTable extends DataTableComponent
{
    protected $model = Category::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        // $this->setBulkActions([
        //     'exportSelected' => 'Export',
        // ]);
        $this->setPrimaryKey('id');
        $this->setDefaultSort('created_at', 'desc');
        $this->setColumnSelectDisabled();
        $this->setFilterLayoutSlideDown();
        $this->setQueryStringDisabled();
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Name", "name")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable()->format(function ($value) {
                    return $value->format('d M Y, h:i A');
                }),
            BooleanColumn::make("Active", "active")
                ->sortable(),

            ButtonGroupColumn::make('Actions', 'id')
                ->buttons([
                    LinkColumn::make('Actions')
                        ->title(fn ($row) => 'Edit')
                        ->location(fn ($row) => 'javascript:void(0)')
                        ->attributes(function ($row) {
                            return [
                                'class' => 'btn btn-primary btn-xs',
                                'data-toggle' => "modal", 'data-target' => "#open",
                                'wire:click' => "\$emit('onCategoryEdit', {$row->id})",
                            ];
                        }),
                    LinkColumn::make('Actions')
                        ->title(fn ($row) => 'Delete')
                        ->location(fn ($row) => 'javascript:void(0)')
                        ->attributes(function ($row) {
                            return [
                                'class' => 'btn btn-danger btn-xs',
                                'data-toggle' => "modal", 'data-target' => "#open",
                                'wire:click' => "\$emit('onCategoryDelete', {$row->id})",
                            ];
                        }),
                ]),
        ];
    }

    // public function builder(): Builder
    // {
    //     return Category::query(); // Select some things
    // }

    public array $bulkActions = [
        'exportSelected' => 'Export',
    ];

    public function exportSelected()
    {
        $users = $this->getSelected();

        $this->clearSelected();
        return Excel::download(new CategoriesExport, 'categories.xlsx');
    }
}
