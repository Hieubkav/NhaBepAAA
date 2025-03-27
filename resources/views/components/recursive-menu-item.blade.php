@props(['item', 'isDrawer' => false])

@if(!$item)
    @return
@endif

@php
    $level = 0;
    $parent = $item->parent;
    while ($parent) {
        $level++;
        $parent = $parent->parent;
    }
@endphp

@if($item->children->isEmpty())
    <a href="{{ $item->getUrl() }}" 
       @class([
           'text-gray-700 hover:text-red-600 hover:bg-red-50 font-medium transition-all duration-200',
           'block w-full px-4 py-2 text-sm' => !$isDrawer,
           'flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100' => $isDrawer,
           'text-red-600 bg-red-50' => $item->isActive()
       ])>
        @if(!$isDrawer && $item->isActive())
            <div class="flex items-center">
                <span class="flex-grow">{{ $item->getName() }}</span>
                <svg class="w-5 h-5 text-red-500 ml-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                </svg>
            </div>
        @else
            {{ $item->getName() }}
        @endif
        @if($isDrawer)
            <div class="flex items-center w-full">
                <div class="flex-shrink-0 {{ $level > 0 ? "ml-{$level}x4" : '' }} flex items-center">
                    <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </div>
                <span class="ml-3 text-sm">{{ $item->getName() }}</span>
            </div>
        @endif
    </a>
@else
    <div class="relative" 
         x-data="{ 
            open: false,
            get isOpen() { return this.open },
            toggle() { this.open = !this.open }
         }">
        <button @click="toggle()"
                @class([
                    'text-gray-700 hover:text-red-600 hover:bg-red-50 font-medium transition-all duration-200 flex items-center justify-between',
                    'w-full px-4 py-2 text-sm' => !$isDrawer,
                    'w-full p-2 text-gray-900 rounded-lg hover:bg-gray-100' => $isDrawer,
                    'text-red-600 bg-red-50' => $item->isActive() || $item->hasActiveChild()
                ])>
            @if($isDrawer)
                <div class="flex items-center w-full">
                    <div class="flex-shrink-0 {{ $level > 0 ? "ml-{$level}x4" : '' }} flex items-center">
                        <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </div>
                    <span class="ml-3 text-sm flex-grow">{{ $item->getName() }}</span>
                    <svg class="h-4 w-4 transform transition-transform duration-200" 
                         :class="{ 'rotate-180': isOpen }"
                         xmlns="http://www.w3.org/2000/svg" 
                         viewBox="0 0 20 20" 
                         fill="currentColor">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </div>
            @else
                <div class="flex items-center space-x-1">
                    <span class="flex-grow">{{ $item->getName() }}</span>
                    <svg class="h-4 w-4 transform transition-transform duration-200 text-gray-400" 
                         :class="{ 'rotate-180': isOpen }"
                         xmlns="http://www.w3.org/2000/svg" 
                         viewBox="0 0 20 20" 
                         fill="currentColor">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </div>
            @endif
        </button>
        
        <div x-show="isOpen"
             x-collapse
             @class([
                 'relative bg-gray-50/50 rounded-lg mt-1' => $isDrawer,
                 'absolute left-0 w-64 rounded-lg shadow-lg py-1 bg-white/95 backdrop-blur ring-1 ring-gray-200 focus:outline-none z-50 mt-1' => !$isDrawer
             ])>
            @foreach($item->children->sortBy('order') as $child)
                <x-recursive-menu-item :item="$child" :isDrawer="$isDrawer" />
            @endforeach
        </div>
    </div>
@endif

<style>
.ml-1x4 { margin-left: 1rem !important; }
.ml-2x4 { margin-left: 2rem !important; }
.ml-3x4 { margin-left: 3rem !important; }
.ml-4x4 { margin-left: 4rem !important; }
.ml-5x4 { margin-left: 5rem !important; }
</style>