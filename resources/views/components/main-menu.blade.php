@props(['items' => []])

<nav x-data="{ activeMenu: null }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <div class="flex items-center">
                <!-- Desktop Menu -->
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        {{-- Sections Dropdown (Fixed) --}}
                        <div class="relative" x-data="{ open: false }" @click.away="open = false">
                            <button @click="open = !open"
                                    class="bg-red-600 text-white hover:bg-red-700 font-medium transition-all duration-200 flex items-center space-x-2 px-4 py-2 rounded-md">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" 
                                          stroke-linejoin="round" 
                                          stroke-width="2" 
                                          d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                </svg>
                                <span>Phân mục</span>
                                <svg class="h-4 w-4 transform transition-transform duration-200"
                                     :class="{ 'rotate-180': open }"
                                     xmlns="http://www.w3.org/2000/svg" 
                                     viewBox="0 0 20 20" 
                                     fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>

                            <template x-if="open">
                                <div class="fixed inset-0 bg-black bg-opacity-25 z-40" 
                                     @click="open = false"></div>
                            </template>

                            <div x-show="open"
                                 x-transition:enter="transition ease-out duration-200"
                                 x-transition:enter-start="opacity-0 -translate-y-2"
                                 x-transition:enter-end="opacity-100 translate-y-0"
                                 x-transition:leave="transition ease-in duration-150"
                                 x-transition:leave-start="opacity-100 translate-y-0"
                                 x-transition:leave-end="opacity-0 -translate-y-2"
                                 class="absolute left-0 mt-1 w-72 rounded-lg shadow-lg bg-white/95 backdrop-blur ring-1 ring-gray-200 focus:outline-none z-50">
                                <div class="py-2">
                                    @foreach(\App\Models\Section::where('status', true)->get() as $section)
                                        <a href="{{ route('sections.show', $section->id) }}" 
                                           class="flex items-center px-4 py-3 hover:bg-gray-50 group transition-colors duration-200">
                                            @if($section->icon)
                                                <div class="w-8 h-8 rounded-lg bg-red-100 group-hover:bg-red-200 flex items-center justify-center transition-colors duration-200 mr-3">
                                                    <img src="{{ asset('storage/' . $section->icon) }}" 
                                                         alt="{{ $section->title }} icon" 
                                                         class="w-5 h-5">
                                                </div>
                                            @endif
                                            <span class="text-gray-700 group-hover:text-gray-900">{{ $section->title }}</span>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        @foreach($items as $item)
                            @if($item->children->isEmpty())
                                <a href="{{ $item->getUrl() }}" 
                                   class="text-gray-700 hover:text-gray-900 hover:bg-red-200/80 font-medium transition-all duration-200 px-3 py-2 rounded-md
                                          {{ $item->isActive() ? 'text-red-600' : '' }}">
                                    {{ $item->getName() }}
                                </a>
                            @else
                                <div class="relative" x-data="{ open: false }" @click.away="open = false">
                                    <button @click="open = !open; $dispatch('menu-clicked', '{{ $item->id }}')"
                                            class="text-gray-700 hover:text-gray-900 hover:bg-red-200/80 font-medium transition-all duration-200 flex items-center space-x-1 px-3 py-2 rounded-md
                                                   {{ ($item->isActive() || $item->hasActiveChild()) ? 'text-furniture' : '' }}">
                                        <span>{{ $item->getName() }}</span>
                                        <svg class="h-4 w-4 transform transition-transform duration-200" 
                                             :class="{ 'rotate-180': open }"
                                             xmlns="http://www.w3.org/2000/svg" 
                                             viewBox="0 0 20 20" 
                                             fill="currentColor">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>

                                    <template x-if="open">
                                        <div class="fixed inset-0 bg-black bg-opacity-25 z-40" 
                                             @click="open = false"></div>
                                    </template>

                                    <div x-show="open"
                                         x-transition:enter="transition ease-out duration-200"
                                         x-transition:enter-start="opacity-0 -translate-y-2"
                                         x-transition:enter-end="opacity-100 translate-y-0"
                                         x-transition:leave="transition ease-in duration-150"
                                         x-transition:leave-start="opacity-100 translate-y-0"
                                         x-transition:leave-end="opacity-0 -translate-y-2"
                                         class="absolute left-0 mt-1 rounded-lg shadow-lg bg-white/95 backdrop-blur ring-1 ring-gray-200 focus:outline-none z-50"
                                         style="min-width: 200px;">
                                        <div class="py-2">
                                            @foreach($item->children->sortBy('order') as $child)
                                                <x-recursive-menu-item :item="$child" />
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Mobile Hamburger Button -->
            <div class="md:hidden">
                <button type="button"
                        data-drawer-target="drawer-navigation"
                        data-drawer-show="drawer-navigation"
                        aria-controls="drawer-navigation"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-600 hover:text-gray-900 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-gray-400">
                    <span class="sr-only">Mở menu</span>
                    <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</nav>

@push('scripts')
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.store('menu', {
            activeId: null
        })
    })
</script>
@endpush