@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'text-sm text-red-600 dark:text-red-400 space-y-1']) }}>
        @foreach ((array) $messages as $index => $message)
            <li wire:key="{{$index}}">{{ $message }}</li>
        @endforeach
    </ul>
@endif
