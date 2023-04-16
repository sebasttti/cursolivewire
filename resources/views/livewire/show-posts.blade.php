<div>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $title }}
        </h2>
    </x-slot>


    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-1">
        <x-table>

            <div class="py-4 w-full flex justify-around">
               <x-input type="text" wire:model='search' placeholder='Filtrar resultados'/>

               @livewire('create-post')
            </div>

            

            @if($posts->count())

            <table class="w-full">
                <thead class="bg-white border-b">
                    <tr>
                        <th scope="col" class="cursor-pointer text-sm font-medium text-gray-900 px-4 py-4 text-left" wire:click="assignOrder('id')">
                            Id @if($this->sort == 'id') <i class="fa {{$this->direction == 'desc' ? 'fa-caret-down' : 'fa-caret-up'}}"></i> @endif
                        </th>
                        <th scope="col" class="cursor-pointer text-sm font-medium text-gray-900 px-4 py-4 text-left" wire:click="assignOrder('title')">
                            Title @if($this->sort == 'title') <i class="fa {{$this->direction == 'desc' ? 'fa-caret-down' : 'fa-caret-up'}}"></i> @endif
                        </th>
                        <th scope="col" class="cursor-pointer text-sm font-medium text-gray-900 px-4 py-4 text-left" wire:click="assignOrder('content')">
                            Content @if($this->sort == 'content') <i class="fa {{$this->direction == 'desc' ? 'fa-caret-down' : 'fa-caret-up'}}"></i> @endif
                        </th>
                        <th scope="col" class="text-sm font-medium text-gray-900 px-4 py-4 text-left">
                            Options
                        </th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($posts as $eachPost)

                    <tr class="{{(int)$loop->index % 2 == 0 ? 'bg-gray-100' : 'bg-white' }} border-b">
                        <td class="px-6 py-4 text-sm font-medium text-gray-900">{{$eachPost->id}}</td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4">
                            {{$eachPost->title}}
                        </td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4">
                            {{$eachPost->content}}
                        </td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4">
                            @livewire('edit-post',['post'=>$eachPost], key($eachPost->id))
                        </td>
                    </tr>
                        
                    @endforeach
                    
                </tbody>
            </table>
                
            @else

            <div class="px-6 py-4">
                No existe ningún regitro coincidente
            </div>
                
            @endif

            
        </x-table>

                        
           

    </div>
</div>
