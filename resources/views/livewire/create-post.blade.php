<div>
    <x-danger-button wire:click="$set('isOpened', true)">
        Crear nuevo Post
    </x-danger-button>

    <x-dialog-modal wire:model='isOpened'>
        <x-slot name='title'>
            Crear un nuevo post
        </x-slot>
        <x-slot name='content'>

            <div>
                <div class="bg-red-100 border border-red-400 text-red-600 px-4 py-3 rounded relative mb-4"
                 role="alert"
                 wire:loading wire:target="image">
                    <strong class="font-bold">Imágen cargando!</strong>
                    <span class="inline">Previsualización de imágen en proceso</span>
                </div>

                @if ($image)
                    <img src="{{ $image->temporaryUrl() }}" alt="temporaryImg" class="mb-4 mx-auto">
                @endif
            </div>

            <div class="mb-4">
                <x-label value='Título del Post:' />
                <x-input type='text' class="w-full" placeholder="Por favor introduzca un título" wire:model='title'>
                </x-input>

                <x-input-error for='title' />

            </div>

            <div class="mb-4">
                <x-label value='Contenido del Post:' />
                <textarea rows="6" class="form-control w-full" placeholder="Por favor introduzca el contenido"
                    wire:model='content'></textarea>
                <x-input-error for='content' />

            </div>

            <div class="mb-4">
                <x-label value='Imágen del post' />
                <x-input id="{{$cleanImageInput}}" type='file' wire:model='image'></x-input>
                <x-input-error for='image' />
            </div>
        </x-slot>
        <x-slot name='footer'>
            <x-secondary-button class="mr-3 diasbled:opacity-25" 
            wire:click='savePost' 
            wire:loading.remove
                {{-- wire:loading.class='bg-blue-500' --}} {{-- wire:loading.attr='disabled' --}}
                 wire:target='savePost, image'>Enviar información
            </x-secondary-button>
            <x-danger-button wire:click="$set('isOpened', false)">Cancelar</x-danger-button>
            <span class="mr-3" wire:loading wire:target='savePost'>Cargando...</span>
        </x-slot>
    </x-dialog-modal>
</div>
