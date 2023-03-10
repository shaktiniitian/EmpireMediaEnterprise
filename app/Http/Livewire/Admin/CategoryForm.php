<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;
use WireUi\Traits\Actions;

class CategoryForm extends Component
{

    use Actions;

    public $open = true;

    public $item = [];
    public static $INITIAL_VALUE = [
        "name" => '',
        "active" => true,
    ];
    

    protected $rules = [
        'item.name' => 'required|min:3',
        'item.active' => 'required',
    ];

    protected $validationAttributes = [
        'item.name' => 'name'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    protected $listeners = ['onCategoryEdit' => 'onEdit', 'onCategoryDelete' => 'onDelete'];

    public function render()
    {
        return view('livewire.admin.category-form');
    }

    public function mount()
    {
        $this->item = self::$INITIAL_VALUE;
    }


    public function onEdit($id)
    {
        $this->item = Category::find($id)->toArray();
    }

    public function Notify(){

        $this->notification()->success('Your profile was successfully saved'); 
    }

    public function onNew()
    {
 
 
        $this->item = self::$INITIAL_VALUE;

    }

    public function onSave()
    {
        $this->validate();

        if(!empty($this->item['id'])){
            Category::where('id',$this->item['id'])->update([
                "name" => $this->item['name'],
                "active" => $this->item['active'] ? 1 : 0
            ]);
        }else{
        Category::create([
            "name" => $this->item['name'],
            "type" => 'channel',
            "active" => $this->item['active'] ? 1 : 0
        ]);
    }
    $this->item = self::$INITIAL_VALUE;
    $this->emit('refreshDatatable');
    // session()->flash('message', 'Category successfully created.');
        $this->emit('open');
        $this->notification()->success('Category successfully created.'); 
    }

    public function onDelete($id)
    {
        $this->dialog()->confirm([
            'title' => 'Are you Sure?',
            'icon' => 'exclamation-circle',
            'iconColor' => 'text-yellow-600',
            'description' => 'Do you really want to delete this category? This action can not be undone.',
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
        Category::find($id)->delete();
        $this->notification()->success('Category Deleted!');
        $this->emit('refreshDatatable');
    }
}
