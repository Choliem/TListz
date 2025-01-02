<x-layout>
    <x-slot:title>
        {{ $title ?? 'Default Title' }}
    </x-slot:title>
    <h3 class="text-xl">About Me</h3>
    <p>Nama: {{ $nama }}</p>
</x-layout>
