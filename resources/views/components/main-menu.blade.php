@props(['items' => []])

<nav class="bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <div class="flex items-center">
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        @foreach($items as $item)
                            @if($item->children->isEmpty())
                                <a href="{{ $item->getUrl() }}" 
                                   class="text-gray-dark hover:text-furniture font-medium transition-colors
                                          {{ $item->isActive() ? 'text-furniture' : '' }}">
                                    {{ $item->getName() }}
                                </a>
                            @else
                                <div class="relative" x-data="{ open: false }">
                                    <button @click="open = true"
                                            @click.outside="open = false"
                                            class="text-gray-dark hover:text-furniture font-medium transition-colors flex items-center
                                                   {{ ($item->isActive() || $item->hasActiveChild()) ? 'text-furniture' : '' }}">
                                        {{ $item->getName() }}
                                        <svg class="ml-2 -mr-0.5 h-4 w-4 inline-block transform transition-transform" 
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
                                         class="absolute left-0 mt-2 w-48 rounded-lg shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none">
                                        @foreach($item->children->sortBy('order') as $child)
                                            <x-recursive-menu-item :item="$child" />
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile menu -->
    <div class="md:hidden" 
         x-data="{ open: false }" 
         x-show="open" 
         id="mobile-menu">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
            @foreach($items as $item)
                @if($item->children->isEmpty())
                    <a href="{{ $item->getUrl() }}" 
                       class="text-gray-dark hover:text-furniture font-medium transition-colors block px-3 py-2 rounded-md
                              {{ $item->isActive() ? 'text-furniture' : '' }}">
                        {{ $item->getName() }}
                    </a>
                @else
                    <div class="space-y-1" x-data="{ expanded: false }">
                        <button @click="expanded = true"
                                @click.outside="expanded = false"
                                class="text-gray-dark hover:text-furniture font-medium transition-colors flex items-center justify-between w-full px-3 py-2 rounded-md
                                       {{ ($item->isActive() || $item->hasActiveChild()) ? 'text-furniture' : '' }}">
                            <span>{{ $item->getName() }}</span>
                            <svg class="h-4 w-4 inline-block transform transition-transform" 
                                 :class="{ 'rotate-180': expanded }"
                                 xmlns="http://www.w3.org/2000/svg" 
                                 viewBox="0 0 20 20" 
                                 fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <div class="pl-4" x-show="expanded">
                            @foreach($item->children->sortBy('order') as $child)
                                <x-recursive-menu-item :item="$child" />
                            @endforeach
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</nav>