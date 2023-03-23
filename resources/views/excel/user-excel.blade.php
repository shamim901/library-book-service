<x-layout>
    <x-slot name="title">
        Custom Title
    </x-slot>

    @foreach ($data as $item)
        {{ $item }}
    @endforeach
</x-layout>