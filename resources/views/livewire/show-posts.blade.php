<div>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $title }}
        </h2>
    </x-slot>


    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-1">
        <x-table>

            <div class="py-4 w-full flex justify-around">
                <div class="">
                    <span>Mostrar:</span>
                    <select class="form-control mx-4" wire:model="resultsQuantity">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">1000</option>
                    </select>
                    <span>Entradas</span>
                </div>

               <x-input type="text" wire:model='search' placeholder='Filtrar resultados'/>

               @livewire('create-post')
            </div>

            

            

            @if($posts->count())

            <table class="w-full">
                <thead class="bg-white border-b">
                    <tr>
                        <th scope="col" class="cursor-pointer text-sm font-medium text-gray-900 px-4 py-4 text-left" style="width:15%" wire:click="assignOrder('id')">
                            Id @if($this->sort == 'id') <i class="fa {{$this->direction == 'desc' ? 'fa-caret-down' : 'fa-caret-up'}}"></i> @endif
                        </th>
                        <th scope="col" class="cursor-pointer text-sm font-medium text-gray-900 px-4 py-4 text-left" style="width:25%" wire:click="assignOrder('title')">
                            Title @if($this->sort == 'title') <i class="fa {{$this->direction == 'desc' ? 'fa-caret-down' : 'fa-caret-up'}}"></i> @endif
                        </th>
                        <th scope="col" class="cursor-pointer text-sm font-medium text-gray-900 px-4 py-4 text-left" style="width:35%" wire:click="assignOrder('content')">
                            Content @if($this->sort == 'content') <i class="fa {{$this->direction == 'desc' ? 'fa-caret-down' : 'fa-caret-up'}}"></i> @endif
                        </th>
                        <th scope="col" class="text-sm font-medium text-gray-900 px-4 py-4 text-left" style="width:25%">
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
                        <td class="text-sm text-gray-900 font-light px-6 py-4 flex justify-center">
                            @livewire('edit-post',['post'=>$eachPost], key($eachPost->id))
                            <div style="width:15px"></div>    
                            <div class="btn btn-red" wire:click="$emit('deletePostConfirm', {{$eachPost->id}})">
                                <i class="fa fa-trash"></i>
                            </div>
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

            @if ($posts->hasPages())
                <div class="px-6 py-3">
                    {{$posts->links()}}
                </div>
            @endif
            
        </x-table>

                        
           

    </div>
</div>

