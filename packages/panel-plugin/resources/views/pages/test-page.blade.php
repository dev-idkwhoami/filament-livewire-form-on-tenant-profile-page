<x-filament-panels::page>

    This is a test page!

    <x-filament-panels::form wire:submit="save">

        {{ $this->form }}

        <x-filament-panels::form.actions
            :actions="$this->getFormActions()"
        />
    </x-filament-panels::form>

</x-filament-panels::page>
