<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.min.js"></script>
<script>pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.worker.min.js';</script>

@if($pdf)
    <div class="mt-8 border border-gray-200 rounded-lg overflow-hidden shadow-lg">
        {{-- PDF Actions --}}
        <div class="bg-white border-b border-gray-200 p-4 flex flex-col sm:flex-row items-start sm:items-center justify-between space-y-4 sm:space-y-0">
            <div class="flex flex-col sm:flex-row items-start sm:items-center space-y-4 sm:space-y-0 sm:space-x-4 w-full sm:w-auto">
                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                    <svg class="w-4 h-4 mr-1.5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M7 2a1 1 0 00-.707 1.707L7 4.414v3.758a1 1 0 01-.293.707l-4 4C.817 14.769 2.156 18 4.828 18h10.343c2.673 0 4.012-3.231 2.122-5.121l-4-4A1 1 0 0113 8.172V4.414l.707-.707A1 1 0 0013 2H7zm2 6.172V4h2v4.172a3 3 0 00.879 2.12l1.027 1.028a4 4 0 00-2.171.102l-.47.156a4 4 0 01-2.53 0l-.563-.187a1.993 1.993 0 00-.114-.035l1.063-1.063A3 3 0 009 8.172z"/>
                    </svg>
                    Tài liệu PDF
                </span>
                <div class="flex items-center space-x-2">
                    <button id="prev" class="px-3 py-1 bg-gray-100 hover:bg-gray-200 rounded-md">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                        </svg>
                    </button>
                    <span id="page_num" class="text-sm font-medium"></span>
                    <span class="text-sm font-medium">/</span>
                    <span id="page_count" class="text-sm font-medium"></span>
                    <button id="next" class="px-3 py-1 bg-gray-100 hover:bg-gray-200 rounded-md">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="flex flex-col sm:flex-row items-stretch sm:items-center space-y-2 sm:space-y-0 sm:space-x-2 w-full sm:w-auto">
                <a href="{{ Storage::url($pdf) }}" download class="inline-flex items-center justify-center px-4 py-2 bg-white hover:bg-gray-50 text-gray-700 text-sm font-medium rounded-md border border-gray-300 w-full sm:w-auto">
                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v3.586L7.707 9.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 10.586V7z"/>
                    </svg>
                    Tải xuống
                </a>
                <a href="{{ Storage::url($pdf) }}" target="_blank" class="inline-flex items-center justify-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white text-sm font-medium rounded-md w-full sm:w-auto">
                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M11 3a1 1 0 100 2h2.586l-6.293 6.293a1 1 0 101.414 1.414L15 6.414V9a1 1 0 102 0V4a1 1 0 00-1-1h-5z"/>
                        <path d="M5 5a2 2 0 00-2 2v8a2 2 0 002 2h8a2 2 0 002-2v-3a1 1 0 10-2 0v3H5V7h3a1 1 0 000-2H5z"/>
                    </svg>
                    Mở trong tab mới
                </a>
            </div>
        </div>

        {{-- PDF Viewer --}}
        <div class="bg-gray-100 pdf-container">
            <canvas id="pdf-canvas" class="mx-auto"></canvas>
        </div>
    </div>

    <script>
        // Khởi tạo PDF viewer
        let pdfDoc = null,
            pageNum = 1,
            pageRendering = false,
            pageNumPending = null,
            canvas = document.getElementById('pdf-canvas'),
            ctx = canvas.getContext('2d');

        // Responsive scale calculation
        function getScale() {
            const width = window.innerWidth;
            if (width <= 640) { // mobile
                return 0.8;
            } else if (width <= 1024) { // tablet
                return 1.2;
            }
            return 1.5; // desktop
        }

        let scale = getScale();

        // Handle window resize
        let resizeTimeout;
        window.addEventListener('resize', function() {
            clearTimeout(resizeTimeout);
            resizeTimeout = setTimeout(function() {
                scale = getScale();
                renderPage(pageNum);
            }, 250);
        });

        // Handle orientation change for mobile
        window.addEventListener('orientationchange', function() {
            setTimeout(function() {
                scale = getScale();
                renderPage(pageNum);
            }, 250);
        });

        // Load PDF
        pdfjsLib.getDocument('{{ Storage::url($pdf) }}').promise.then(function(pdfDoc_) {
            pdfDoc = pdfDoc_;
            document.getElementById('page_count').textContent = pdfDoc.numPages;
            renderPage(pageNum);
        }).catch(function(error) {
            console.error('Error loading PDF:', error);
            // Hiển thị thông báo lỗi cho người dùng
            canvas.style.display = 'none';
            const container = document.querySelector('.pdf-container');
            container.innerHTML = '<div class="p-4 text-red-600 text-center">Không thể tải PDF. Vui lòng thử lại sau.</div>';
        });

        function renderPage(num) {
            pageRendering = true;
            canvas.classList.add('loading');

            pdfDoc.getPage(num).then(function(page) {
                const viewport = page.getViewport({scale: scale});
                
                // Adjust canvas size based on viewport
                canvas.height = viewport.height;
                canvas.width = viewport.width;

                // Render PDF page
                const renderContext = {
                    canvasContext: ctx,
                    viewport: viewport
                };

                page.render(renderContext).promise.then(function() {
                    pageRendering = false;
                    canvas.classList.remove('loading');
                    
                    if (pageNumPending !== null) {
                        renderPage(pageNumPending);
                        pageNumPending = null;
                    }
                }).catch(function(error) {
                    console.error('Error rendering page:', error);
                    pageRendering = false;
                    canvas.classList.remove('loading');
                });
            });

            document.getElementById('page_num').textContent = num;
        }

        function queueRenderPage(num) {
            if (pageRendering) {
                pageNumPending = num;
            } else {
                renderPage(num);
            }
        }

        function onPrevPage() {
            if (pageNum <= 1) {
                return;
            }
            pageNum--;
            queueRenderPage(pageNum);
        }

        function onNextPage() {
            if (pageNum >= pdfDoc.numPages) {
                return;
            }
            pageNum++;
            queueRenderPage(pageNum);
        }

        // Add touch swipe support
        let touchStartX = 0;
        let touchEndX = 0;
        
        canvas.addEventListener('touchstart', function(e) {
            touchStartX = e.changedTouches[0].screenX;
        });

        canvas.addEventListener('touchend', function(e) {
            touchEndX = e.changedTouches[0].screenX;
            handleSwipe();
        });

        function handleSwipe() {
            const swipeThreshold = 50;
            const diff = touchEndX - touchStartX;
            
            if (Math.abs(diff) > swipeThreshold) {
                if (diff > 0) {
                    onPrevPage();
                } else {
                    onNextPage();
                }
            }
        }

        document.getElementById('prev').addEventListener('click', onPrevPage);
        document.getElementById('next').addEventListener('click', onNextPage);

        // Keyboard navigation
        document.addEventListener('keydown', function(e) {
            if (e.key === 'ArrowLeft') {
                onPrevPage();
            } else if (e.key === 'ArrowRight') {
                onNextPage();
            }
        });
    </script>
@endif