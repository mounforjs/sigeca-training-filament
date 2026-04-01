<x-filament-panels::page>
    <x-filament::section>
        {{-- Al estar ambos en el headerForm con 4 columnas, saldrán juntos --}}
        {{ $this->headerForm }}
    </x-filament::section>

    <div class="mt-6">
        {{ $this->table }}
    </div>
</x-filament-panels::page>