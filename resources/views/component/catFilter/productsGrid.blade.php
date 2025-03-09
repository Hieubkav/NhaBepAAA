<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
    <!-- Single Product Card -->
    <template x-for="i in 10" :key="i">
        @include('component.catFilter.productsGrid.product')
    </template>
</div>
