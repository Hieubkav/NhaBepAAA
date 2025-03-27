@extends('layouts.shop')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8" 
     x-data="{ isOpen: false }"
     class="bg-gradient-to-br from-gray-50 to-white">
    {{-- Hero Section --}}
    <div class="relative h-[300px] sm:h-[400px] rounded-3xl overflow-hidden mb-12 group"
         data-aos="fade-up">
        <img src="{{ asset('storage/' . $section->thumbnail) }}" 
             alt="{{ $section->title }}" 
             class="w-full h-full object-cover transform group-hover:scale-105 transition-all duration-700">
        <div class="absolute inset-0 bg-gradient-to-t from-gray-900/90 via-gray-900/50 to-transparent backdrop-blur-sm">
            <div class="absolute bottom-0 left-0 p-8 sm:p-12">
                <h1 class="text-3xl sm:text-5xl lg:text-6xl font-bold text-white mb-4 tracking-tight" 
                    data-aos="fade-up" 
                    data-aos-delay="200">
                    {{ $section->title }}
                </h1>
                <div class="w-20 h-1 bg-red-500 rounded-full transform origin-left group-hover:scale-x-150 transition-transform duration-300"></div>
            </div>
        </div>
    </div>

    {{-- Content Section with Extended Description --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-16" data-aos="fade-up" data-aos-delay="300">
        <div class="bg-white/80 backdrop-blur-md rounded-3xl p-8 
                    shadow-[0_10px_20px_rgba(240,_240,_240,_0.8)]
                    hover:shadow-[0_20px_40px_rgba(240,_240,_240,_0.9)]
                    transition-all duration-300">
            <div class="relative">
                <div class="prose max-w-none line-clamp-[12] text-gray-600 leading-relaxed" x-ref="description">
                    {!! $section->description !!}
                </div>
                <div x-show="$refs.description.scrollHeight > $refs.description.clientHeight" 
                     class="absolute bottom-0 left-0 right-0 text-center pb-4 pt-20 
                            bg-gradient-to-t from-white via-white/90 to-transparent">
                    <button @click="isOpen = true"
                            class="group relative inline-flex items-center gap-2 px-6 py-3 rounded-2xl 
                                   bg-gradient-to-r from-red-500 to-red-600
                                   hover:from-red-600 hover:to-red-700
                                   text-white font-medium
                                   transform hover:translate-y-[-2px] transition-all duration-200
                                   focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                        <span>Xem thêm</span>
                        <svg class="w-5 h-5 transition-transform duration-200 group-hover:translate-x-1" 
                             fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        @if($section->thumbnail)
        <div class="relative rounded-3xl overflow-hidden group
                    shadow-[0_10px_20px_rgba(240,_240,_240,_0.8)]"
             style="min-height: 400px;">
            <img src="{{ asset('storage/' . $section->thumbnail) }}" 
                 alt="{{ $section->title }}" 
                 class="w-full h-full object-cover transform group-hover:scale-105 transition-all duration-700">
            <div class="absolute inset-0 bg-gradient-to-t from-gray-900/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
        </div>
        @endif
    </div>

    {{-- Modal for Very Long Content --}}
    <div x-show="isOpen" 
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 scale-95"
         x-transition:enter-end="opacity-100 scale-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 scale-100"
         x-transition:leave-end="opacity-0 scale-95"
         class="fixed inset-0 z-[60] overflow-y-auto"
         style="display: none;">
        <div class="flex items-end sm:items-center justify-center min-h-screen pt-24 px-4 pb-4 text-center sm:p-0">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-900/40 backdrop-blur-md" @click="isOpen = false"></div>
            </div>

            <div class="relative inline-block align-bottom bg-white rounded-t-3xl sm:rounded-3xl text-left overflow-hidden shadow-xl transform transition-all sm:align-middle sm:max-w-lg w-full"
                 @click.away="isOpen = false">
                <div class="absolute top-3 right-3 z-10">
                    <button @click="isOpen = false"
                            class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-gray-100 hover:bg-gray-200 transition-colors duration-200">
                        <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>

                <div class="bg-white p-6 sm:p-8">
                    <div class="prose max-w-none max-h-[70vh] overflow-y-auto pr-4 custom-scrollbar">
                        <style>
                            .custom-scrollbar::-webkit-scrollbar {
                                width: 6px;
                            }
                            .custom-scrollbar::-webkit-scrollbar-track {
                                background: #f1f1f1;
                                border-radius: 100vh;
                            }
                            .custom-scrollbar::-webkit-scrollbar-thumb {
                                background: #d1d5db;
                                border-radius: 100vh;
                            }
                            .custom-scrollbar::-webkit-scrollbar-thumb:hover {
                                background: #9ca3af;
                            }
                        </style>
                        {!! $section->description !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Categories Grid --}}
    @if($section->cats->isNotEmpty())
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" data-aos="fade-up" data-aos-delay="400">
        @foreach($section->cats as $cat)
        <div class="group bg-white/80 backdrop-blur-md rounded-3xl overflow-hidden
                    shadow-[0_10px_20px_rgba(240,_240,_240,_0.8)]
                    hover:shadow-[0_20px_40px_rgba(240,_240,_240,_0.9)]
                    transform hover:translate-y-[-4px] transition-all duration-300">
            @if($cat->thumbnail)
            <div class="relative h-56 sm:h-64">
                <img src="{{ asset('storage/' . $cat->thumbnail) }}" 
                     alt="{{ $cat->name }}" 
                     class="w-full h-full object-cover transform group-hover:scale-105 transition-all duration-700">
                <div class="absolute inset-0 bg-gradient-to-t from-gray-900/60 via-gray-900/30 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-300"></div>
            </div>
            @endif
            <div class="p-6 sm:p-8">
                <h3 class="text-xl sm:text-2xl font-bold text-gray-900 mb-4 group-hover:text-red-600 transition-colors duration-200">
                    {{ $cat->name }}
                </h3>
                <p class="text-gray-600 mb-6 line-clamp-3">{{ $cat->description }}</p>
                <a href="{{ route('catFilter', $cat->id) }}" 
                   class="group inline-flex items-center gap-2 text-red-600 font-medium hover:text-red-700 transition-colors duration-200">
                    <span>Xem chi tiết</span>
                    <svg class="w-5 h-5 transition-transform duration-200 group-hover:translate-x-1" 
                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
            </div>
        </div>
        @endforeach
    </div>
    @endif
</div>
@endsection