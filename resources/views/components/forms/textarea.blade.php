@props(['label', 'name'])

@php
    $defaults = [

        'id' => $name,
        'name' => $name,
        'class' => 'rounded-xl bg-white/10 border resize-none h-44 border-white/10 px-5 py-4 w-full transition-colors duration-300',
        'value' => old($name)
    ];
@endphp

<x-forms.field :$label :$name>
    <textarea {{ $attributes($defaults) }}>
</x-forms.field>