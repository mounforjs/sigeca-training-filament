<x-filament-panels::page>
    <form wire:submit.prevent="save" id="asistencia-form">
        {{ $this->form }}
    </form>

    <div class="my-8 border-transparent">
            <x-filament::button type="button" wire:click="save" wire:loading.attr="disabled" size="lg" form="asistencia-form">
                Guardar Asistencia del Día
            </x-filament::button>
    </div>
</x-filament-panels::page>