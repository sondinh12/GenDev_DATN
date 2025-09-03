<div class="loading-overlay" id="loadingOverlay">
    <div class="loading-spinner">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Đang tải...</span>
        </div>
        <div class="loading-text mt-3">
            <h5 class="text-primary">Đang tải...</h5>
            <p class="text-muted">Vui lòng chờ trong giây lát</p>
        </div>
    </div>
</div>

<style>
    .loading-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, 0.95);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 9999;
        backdrop-filter: blur(5px);
    }

    .loading-spinner {
        text-align: center;
    }

    .loading-text h5 {
        font-weight: 600;
        margin-bottom: 5px;
    }

    .loading-text p {
        font-size: 0.9rem;
        margin: 0;
    }

    .spinner-border {
        width: 3rem;
        height: 3rem;
    }
</style>

<script>
    // Ẩn loading khi trang đã tải xong
window.addEventListener('load', function() {
    const loadingOverlay = document.getElementById('loadingOverlay');
    if (loadingOverlay) {
        setTimeout(() => {
            loadingOverlay.style.opacity = '0';
            setTimeout(() => {
                loadingOverlay.style.display = 'none';
            }, 300);
        }, 500);
    }
});

// Hiển thị loading khi chuyển trang
document.addEventListener('DOMContentLoaded', function() {
    const links = document.querySelectorAll('a[href]:not([href^="#"])');
    links.forEach(link => {
        link.addEventListener('click', function() {
            const loadingOverlay = document.getElementById('loadingOverlay');
            if (loadingOverlay) {
                loadingOverlay.style.display = 'flex';
                loadingOverlay.style.opacity = '1';
            }
        });
    });
});
</script>