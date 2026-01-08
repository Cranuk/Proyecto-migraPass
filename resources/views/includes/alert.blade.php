@if($info)
<div class="alert alert-notice">
    {{ $info }}
    <button class="button delete" wire:click="$set('info', '')">x</button>
</div>
@endif
