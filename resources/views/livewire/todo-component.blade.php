<div>
    <div id="head" class="flex border-blue-800 border-t-2">
        <div class="w-full">
            <header class="flex bg-white justify-between h-20 border-b border-b-gray-200 items-center px-6">
                <div id="left-header" class="">
                </div>
                <div id="right-header" class="text-gray-800 hover:text-gray-600 space-x-3">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-7 h-7">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
            </header>
        </div>
    </div>
    <div id="content" class="mx-auto" style="max-width:500px;">
        <div class="container content py-6 mx-auto">
            <div class="mx-auto">
                <div id="create-form" class="hover:shadow p-6 bg-white border-blue-500 border-t-2">
                    <div class="flex ">
                        <h2 class="font-semibold text-lg text-gray-800 mb-5">Create New Todo</h2>
                    </div>
                    <div>
                        <form wire:submit.prevent='createNewTodo'>
                            
                            
                            <div class="mb-6">
                                <label for="title"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">*
                                    Todo </label>
                                <input wire:model='newToDoName' type="text" id="title" placeholder="Todo.."
                                    class="bg-gray-100  text-gray-900 text-sm rounded block w-full p-2.5">
                                @error('newToDoName')
                                    <span class="text-red-500 text-xs mt-3 block ">{{$message}}</span>
                                @enderror

                            </div>
                            <button type="submit"
                                class="px-4 py-2 bg-blue-500 text-white font-semibold rounded hover:bg-blue-600">Create
                                +</button>

                            @session('success')
                                <span class="text-green-500 text-xs">{{session('success')}}</span>
                            @endsession
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div id="search-box" class="flex flex-col items-center px-2 my-4 justify-center">
            <div class="flex justify-center items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                </svg>
                <input wire:model.live.debounce.500ms   ='searchParam' type="text" placeholder="Search..."
                    class="bg-gray-100 ml-2 rounded px-4 py-2 hover:bg-gray-100" />
            </div>
        </div>
        <div id="todos-list">
            @foreach ($todos as $todo)
                @include('livewire.todo-card')
            @endforeach

            <div class="my-2">
                {{$todos->links()}}
            </div>
        </div>
    </div>
    <div wire:loading>
        @livewire('loading-component') 
    </div>
   
    @if ($showErrorModal)
        @livewire('modal', ['message' => session('error')])
    @endif
   
</div>
