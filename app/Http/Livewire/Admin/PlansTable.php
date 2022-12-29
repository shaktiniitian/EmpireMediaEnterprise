<?php

namespace App\Http\Livewire\Admin;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;

use App\Models\Admin\Plan;

class PlansTable extends DataTableComponent
{
    protected $model = Plan::class;

    public function configure(): void
    {
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
            Column::make("Description", "description")
                ->sortable(),
            Column::make("Amount", "amount")
                ->sortable(),
            BooleanColumn::make("Active", "active")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable()->format(function ($value) {
                    return $value->format('d M Y, h:i A');
                }),
            ButtonGroupColumn::make('Actions', 'id')
                ->buttons([
                    LinkColumn::make('Actions')
                        ->title(fn ($row) => 'Edit')
                        ->location(fn ($row) => 'javascript:void(0)')
                        ->attributes(function ($row) {
                            return [
                                'class' => 'btn btn-primary btn-xs',
                                'data-toggle' => "modal", 'data-target' => "#open",
                                'wire:click' => "\$emit('onPlanEdit', {$row->id})",
                            ];
                        }),
                    LinkColumn::make('Actions')
                        ->title(fn ($row) => 'Delete')
                        ->location(fn ($row) => 'javascript:void(0)')
                        ->attributes(function ($row) {
                            return [
                                'class' => 'btn btn-danger btn-xs',
                                'wire:click' => "\$emit('onPlanDelete', {$row->id})",
                            ];
                        }),
                ]),

        ];
    }

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
