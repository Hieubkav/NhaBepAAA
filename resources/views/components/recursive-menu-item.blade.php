@props(['item', 'isDrawer' => false])

@if(!$item)
    {{-- Skip rendering if item is null --}}
    @return
@endif

@if($item->children->isEmpty())
    <a href="{{ $item->getUrl() }}" 
       @class([
           'text-gray-dark hover:text-furniture font-medium transition-colors',
           'block px-4 py-2 text-sm' => !$isDrawer,
           'flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 w-full' => $isDrawer,
           'text-furniture' => $item->isActive()
       ])>
        @if($isDrawer)
            <div class="flex items-center">
                <svg class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                </svg>
                <span class="ms-3">{{ $item->getName() }}</span>
            </div>
        @else
            {{ $item->getName() }}
        @endif
    </a>
@else
    <div class="relative" x-data="{ open: false }">
        <button @click="open = true"
                @click.outside="open = false"
                @class([
                    'text-gray-dark hover:text-furniture font-medium transition-colors flex items-center justify-between',
                    'w-full px-4 py-2 text-sm' => !$isDrawer,
                    'w-full p-2 text-gray-900 rounded-lg hover:bg-gray-100' => $isDrawer,
                    'text-furniture' => $item->isActive() || $item->hasActiveChild()
                ])>
            @if($isDrawer)
                <div class="flex items-center">
                    <svg class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"/>
                    </svg>
                    <span class="ms-3">{{ $item->getName() }}</span>
                </div>
            @else
                <span>{{ $item->getName() }}</span>
            @endif
            <svg class="h-4 w-4 transform transition-transform" 
                 :class="{ 'rotate-180': open }"
                 xmlns="http://www.w3.org/2000/svg" 
                 viewBox="0 0 20 20" 
                 fill="currentColor">
                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
        </button>
        
        <div x-show="open" 
             x-transition:enter="transition ease-out duration-100"
             x-transition:enter-start="transform opacity-0 scale-95"
             x-transition:enter-end="transform opacity-100 scale-100"
             x-transition:leave="transition ease-in duration-75"
             x-transition:leave-start="transform opacity-100 scale-100"
             x-transition:leave-end="transform opacity-0 scale-95"
             @class([
                 'absolute left-full top-0 w-48 rounded-lg shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none ml-1' => !$isDrawer,
                 'pl-4 mt-2' => $isDrawer
             ])>
            @foreach($item->children->sortBy('order') as $child)
                <x-recursive-menu-item :item="$child" :isDrawer="$isDrawer" />
            @endforeach
        </div>
    </div>
@endif