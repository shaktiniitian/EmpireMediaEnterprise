<div>
    <button  data-toggle="modal" data-target="#open" class="btn btn-primary btn-md">New</button>

    <x-slide-over-form id="open" title="Add/update Category">

        <div class="form-group">
            <label for="title">Enter Name</label>
            <input type="text" class="form-control" wire:model="item.name">
            @error('item.name') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
              <input type="checkbox" wire:model.defer="item.active" class="custom-control-input" id="customSwitch3">
              <label class="custom-control-label" for="customSwitch3">Active</label>
            </div>
            @error('item.active') <span class="text-danger">{{ $message }}</span> @enderror
          </div>
    </x-slide-over-form>
</div>