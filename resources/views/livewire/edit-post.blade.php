<div>
    <div class="btn btn-green" wire:click="$set('isOpened', true)">
        <i class="fa fa-edit"></i>
    </div>


    <x-dialog-modal wire:model='isOpened'>
        <x-slot name='title'>
            Editar el post
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

                @else

                <img src="{{ Storage::url($post->image) }}" alt="actualImg" class="mb-4 mx-auto">

                @endif
            </div>


            <div class="mb-4">
                <x-label value='Título del Post:' />
                <x-input type='text' class="w-full" wire:model="post.title">
                </x-input>

                <x-input-error for='post.title' />

            </div>

            <div class="mb-4">
                <x-label value='Contenido del Post:' />
                <textarea rows="6" class="form-control w-full" wire:model="post.content"></textarea>
                <x-input-error for='post.content' />

            </div>

            <div class="mb-4">
                <x-label value='Imágen del post' />
                <x-input id="{{$cleanImageInput}}" type='file' wire:model='image'></x-input>
                <x-input-error for='image' />
            </div>

        </x-slot>
        <x-slot name='footer'>
            <x-secondary-button class="mr-3 diasbled:opacity-25" wire:click='editPost' wire:loading.remove
                wire:target='editPost'>Editar Post
            </x-secondary-button>
            <x-danger-button wire:click="$set('isOpened', false)">Cancelar</x-danger-button>
        </x-slot>
    </x-dialog-modal>
</div>
