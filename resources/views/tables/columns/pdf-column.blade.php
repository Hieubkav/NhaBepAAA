<div class="flex items-center gap-2">
    @if($getState())
        <span class="flex items-center gap-1 text-success-600 font-medium">
            <x-heroicon-o-document class="w-5 h-5"/>
            <span>PDF</span>
        </span>
        <a href="{{ Storage::url($getState()) }}" 
           target="_blank"
           class="filament-button filament-button-size-sm inline-flex items-center justify-center py-1 gap-1 font-medium rounded-lg border transition-colors outline-none focus:ring-offset-2 focus:ring-2 focus:ring-inset min-h-[2rem] px-3 text-sm text-white shadow focus:ring-white border-transparent bg-success-600 hover:bg-success-500 focus:bg-success-700 focus:ring-offset-success-700">
            <x-heroicon-s-eye class="w-4 h-4"/>
            <span>Mở PDF</span>
        </a>
    @else
        <span class="text-gray-500">Chưa có PDF</span>
    @endif
</div>