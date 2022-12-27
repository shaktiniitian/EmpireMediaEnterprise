<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;

class CategoryForm extends Component
{

    public $open = true;
    public $item = [];

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
        $this->item = [
            "name" => '',
            "active" => true
        ];
    }


    public function onEdit($id)
    {
        $item = Category::find($id);
        $this->item = [
            "name" => $item->name,
            "active" => $item->active 
        ];

    }

    public function onNew()
    {

       // $this->open = true;
        // dd("New Called");
    }

    public function onSave()
    {
        $this->validate();
        Category::firstOrCreate([
            "name" => $this->item['name'],
            "type" => 'channel',
            "active" => $this->item['active'] ? 1 : 0
        ]);
        session()->flash('message', 'Category successfully created.');
        $this->emit('open');


    }
}
