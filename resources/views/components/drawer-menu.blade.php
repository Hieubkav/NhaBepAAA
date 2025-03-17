@props(['items' => []])

<div id="drawer-navigation"
     class="fixed top-0 left-0 z-[110] h-screen p-4 overflow-y-auto transition-transform duration-300 ease-in-out -translate-x-full bg-white w-80 shadow-2xl border-r border-gray-200"
     tabindex="-1"
     aria-labelledby="drawer-navigation-label"
     data-drawer-placement="left">
    
    <div class="flex items-center justify-between mb-6">
        <div class="flex items-center space-x-3">
            <a href="{{route('storeFront')}}" class="flex items-center space-x-3">
                <img src="{{config('app.asset_url')}}/storage/{{ $settings->logo }}" alt="AAA Logo" class="h-12">
            </a>
        </div>
        <button type="button"
                data-drawer-hide="drawer-navigation"
                aria-controls="drawer-navigation"
                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 inline-flex items-center justify-center"
                data-drawer-close>
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
            <span class="sr-only">Đóng menu</span>
        </button>
    </div>

    <div class="h-px bg-gray-200 mb-4"></div>

    <!-- Menu container with shadow and rounded corners -->
    <div class="rounded-lg bg-white shadow-inner">
        <ul class="space-y-1" x-data="{ activeMenu: null }">
            @foreach($items as $item)
                <li class="relative">
                    <x-recursive-menu-item :item="$item" :isDrawer="true" />
                    @if(!$loop->last)
                        <div class="h-px bg-gray-100 my-1"></div>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('drawerMenu', () => ({
            init() {
                this.$watch('$store.menu.activeId', (value) => {
                    if (value) {
                        this.closeOtherMenus(value)
                    }
                })
            },
            closeOtherMenus(activeId) {
                // Tìm tất cả các menu đang mở và đóng chúng nếu không phải menu hiện tại
                document.querySelectorAll('[x-data]').forEach(el => {
                    if (el.__x && el.__x.getUnobservedData().open && el.id !== activeId) {
                        el.__x.getUnobservedData().open = false
                    }
                })
            }
        }))
    })
</script>
@endpush
