@props(['label' => '', 'required' => false])
<div class=" mb-2 pb-md-2">
    <label class="form-label form-label-lg " for="FirstName">{{ $label }}
        @if ($required)
            <span style="color:#F27B7D"> * </span>
        @endif
    </label>
    <input {{ $attributes->merge(['class' => 'form-control form-control-xlg']) }}>
</div>
