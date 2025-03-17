<footer class="bg-furniture-dark text-white py-12">
    <div class="container mx-auto px-4">
        {{-- Main Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            {{-- Showrooms Section --}}
            <div class="lg:col-span-1">
                @include('partials.footer.showrooms')
            </div>

            {{-- Support Section --}}
            <div class="lg:col-span-1">
                @include('partials.footer.support')
            </div>

            {{-- Contact & Payment Section --}}
            <div class="lg:col-span-1">
                @include('partials.footer.contact')
            </div>

            {{-- Social Media Section --}}
            <div class="lg:col-span-1">
                @include('partials.footer.social')
            </div>
        </div>

        {{-- Copyright Section --}}
        <div class="border-t border-furniture-light/20 mt-12 pt-8 text-center text-gray-400">
            <p>&copy; {{ date('Y') }} AAA. Tất cả quyền được bảo lưu.</p>
        </div>
    </div>
</footer>
