<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use WireUi\Traits\Actions;
use App\Models\Admin\Plan;

class PlanForm extends Component
{
    use Actions;

    public $open = true;

    public $item = [];
    public static $INITIAL_VALUE = [
        "name" => '',
        "description" => '',
        "amount" => '',
        "active" => true,
    ];


    protected $rules = [
        'item.name' => 'required|min:3',
        'item.amount' => 'required|min:3',
        'item.active' => 'required',
    ];

    protected $validationAttributes = [
        'item.name' => 'name',
        'item.amount' => 'amount'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    protected $listeners = ['onPlanEdit' => 'onEdit', 'onPlanDelete' => 'onDelete'];

    public function render()
    {
        return view('livewire.admin.plan-form');
    }

    public function mount()
    {
        $this->item = self::$INITIAL_VALUE;
    }


    public function onEdit($id)
    {
        $this->item = Plan::find($id)->toArray();
    }

    public function Notify()
    {

        $this->notification()->success('Your profile was successfully saved');
    }

    public function onNew()
    {
        $this->item = self::$INITIAL_VALUE;
    }

    public function onSave()
    {
        $this->validate();

        if (!empty($this->item['id'])) {
            Plan::where('id', $this->item['id'])->update([
                "name" => $this->item['name'],
                "description" => $this->item['description'],
                "amount" => $this->item['amount'],
                "active" => $this->item['active'] ? 1 : 0
            ]);
        } else {
            Plan::create([
                "name" => $this->item['name'],
                "description" => $this->item['description'],
                "amount" => $this->item['amount'],
                "active" => $this->item['active'] ? 1 : 0
            ]);
        }
        $this->item = self::$INITIAL_VALUE;
        $this->emit('refreshDatatable');
        $this->emit('open');
        $this->notification()->success('Plan successfully created.');
    }

    public function onDelete($id)
    {
        $this->dialog()->confirm([
            'title' => 'Are you Sure?',
            'icon' => 'exclamation-circle',
            'iconColor' => 'text-yellow-600',
            'description' => 'Do you really want to delete this Plan? This action can not be undone.',
            'accept' => [
                'label' => 'Yes, Delete it',
                'method' => 'doDelete',
                'color' => 'negative',
                'size' => 'md',
                'params' => $id,
            ],
            'reject' => [
                'label' => 'Cancel',
                'size' => 'md',
            ],
        ]);
    }

    public function doDelete($id)
    {
        Plan::find($id)->delete();
        $this->notification()->success('Plan Deleted!');
        $this->emit('refreshDatatable');
    }
}
