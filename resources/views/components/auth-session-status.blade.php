@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'form-text']) }}>
        {{ $status }}
    </div>
@endif
