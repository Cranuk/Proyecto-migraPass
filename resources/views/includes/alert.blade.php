@if($info)
<div wire:poll.2s="clearInfo" class="alert alert-notice">
    {{ $info }}
</div>
@endif
