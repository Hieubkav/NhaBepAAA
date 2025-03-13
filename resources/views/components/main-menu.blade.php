@props(['items'])

<nav class="bg-white border-gray-200">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4" x-data="{ open: false }">
        {{-- Mobile menu button --}}
        <button @click="open = !open" class="lg:hidden">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path :class="{'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                <path :class="{'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>

        {{-- Desktop & Mobile menu --}}
        <div :class="{'hidden': !open}" class="w-full lg:block lg:w-auto">
            <ul class="flex flex-col lg:flex-row lg:space-x-8 lg:mt-0">
                @foreach($items as $item)
                    <li class="relative group" x-data="{ dropdown: false }">
                        @if($item->children->count() > 0)
                            <button 
                                @click="dropdown = !dropdown"
                                @click.away="dropdown = false"
                                class="flex items-center py-2 px-3 {{ $item->isActive() || $item->hasActiveChild() ? 'text-blue-600' : 'text-gray-900' }} hover:text-blue-600"
                            >
                                {{ $item->label }}
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </button>
                            
                            <div 
                                x-show="dropdown"
                                class="lg:absolute left-0 mt-2 w-48 bg-white rounded-md shadow-lg lg:border border-gray-100"
                            >
                                <ul class="py-1">
                                    @foreach($item->children as $child)
                                        <li>
                                            <a 
                                                href="{{ $child->getUrl() }}"
                                                class="block px-4 py-2 text-sm {{ $child->isActive() ? 'text-blue-600 bg-gray-50' : 'text-gray-900' }} hover:bg-gray-50"
                                            >
                                                {{ $child->label }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @else
                            <a 
                                href="{{ $item->getUrl() }}"
                                class="block py-2 px-3 {{ $item->isActive() ? 'text-blue-600' : 'text-gray-900' }} hover:text-blue-600"
                            >
                                {{ $item->label }}
                            </a>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</nav>