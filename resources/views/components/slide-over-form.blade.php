
<div class="container text-left">
    <div {{ $attributes }} wire:ignore.self class="modal left fade text-left" tabindex="-1" role="dialog"
        aria-labelledby="Model{{$attributes }}">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">{{$title?? ''}}</h4>
                </div>

                <div class="modal-body">
  
                    @if ($attributes['id'])
                    <form wire:submit.prevent="{{ $attributes['onSubmit'] ?? 'onSave' }}"
                        class="flex-1 flex flex-col justify-between">
                        <div class="flex-1 space-y-6 p-3 sm:p-6 overflow-y-auto">
                            {{ $slot }}
                        </div>
                        <hr>
                        <div class="text-right">
                            <x-button wire:loading.attr="disabled" type="submit" class="btn btn-default">{{
                                $attributes['btn'] ?? 'Submit' }}</x-button>
                        </div>
                    </form>
                    @endif

                </div>

            </div><!-- modal-content -->
        </div><!-- modal-dialog -->
    </div><!-- modal -->


</div>