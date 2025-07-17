<div class="search-container">
    <form method="GET" action="{{ route('shop') }}" class="search-form">
        <div class="input-group">
            <input type="text" name="search" class="form-control search-input" placeholder="Tìm kiếm sản phẩm..."
                value="{{ request('search') }}" autocomplete="off">
            <button type="submit" class="btn btn-primary search-btn">
                <i class="fas fa-search"></i>
            </button>
        </div>

        <!-- Quick search suggestions -->
        <div class="search-suggestions" id="searchSuggestions" style="display: none;">
            <div class="suggestion-categories">
                <h6 class="suggestion-title">Danh mục phổ biến:</h6>
                <div class="suggestion-items">
                    <a href="{{ route('shop', ['category' => 1]) }}" class="suggestion-item">
                        <i class="fas fa-mobile-alt"></i>
                        <span>Điện thoại</span>
                    </a>
                    <a href="{{ route('shop', ['category' => 2]) }}" class="suggestion-item">
                        <i class="fas fa-laptop"></i>
                        <span>Laptop</span>
                    </a>
                    <a href="{{ route('shop', ['category' => 4]) }}" class="suggestion-item">
                        <i class="fas fa-headphones"></i>
                        <span>Phụ kiện</span>
                    </a>
                    <a href="{{ route('shop', ['category' => 5]) }}" class="suggestion-item">
                        <i class="fas fa-music"></i>
                        <span>Âm thanh</span>
                    </a>
                </div>
            </div>

            <div class="suggestion-brands">
                <h6 class="suggestion-title">Thương hiệu:</h6>
                <div class="suggestion-items">
                    <a href="{{ route('shop', ['search' => 'iPhone']) }}" class="suggestion-item">
                        <span>iPhone</span>
                    </a>
                    <a href="{{ route('shop', ['search' => 'Samsung']) }}" class="suggestion-item">
                        <span>Samsung</span>
                    </a>
                    <a href="{{ route('shop', ['search' => 'MacBook']) }}" class="suggestion-item">
                        <span>MacBook</span>
                    </a>
                    <a href="{{ route('shop', ['search' => 'Sony']) }}" class="suggestion-item">
                        <span>Sony</span>
                    </a>
                </div>
            </div>
        </div>
    </form>
</div>

<style>
    .search-container {
        position: relative;
        max-width: 500px;
        margin: 0 auto;
    }

    .search-input {
        border-radius: 25px 0 0 25px;
        border: 2px solid #e9ecef;
        padding: 12px 20px;
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    .search-input:focus {
        border-color: #007bff;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, .25);
    }

    .search-btn {
        border-radius: 0 25px 25px 0;
        padding: 12px 20px;
        border: none;
    }

    .search-suggestions {
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        background: white;
        border: 1px solid #e9ecef;
        border-radius: 10px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        z-index: 1000;
        margin-top: 5px;
        padding: 20px;
    }

    .suggestion-title {
        color: #6c757d;
        font-weight: 600;
        margin-bottom: 10px;
        font-size: 0.9rem;
    }

    .suggestion-items {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-bottom: 20px;
    }

    .suggestion-item {
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 8px 12px;
        background: #f8f9fa;
        border-radius: 20px;
        text-decoration: none;
        color: #495057;
        font-size: 0.9rem;
        transition: all 0.3s ease;
    }

    .suggestion-item:hover {
        background: #007bff;
        color: white;
        text-decoration: none;
    }

    .suggestion-item i {
        font-size: 0.8rem;
    }

    @media (max-width: 768px) {
        .search-container {
            max-width: 100%;
        }

        .suggestion-items {
            flex-direction: column;
        }

        .suggestion-item {
            justify-content: center;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.querySelector('.search-input');
    const searchSuggestions = document.getElementById('searchSuggestions');
    
    // Hiển thị suggestions khi focus vào input
    searchInput.addEventListener('focus', function() {
        searchSuggestions.style.display = 'block';
    });
    
    // Ẩn suggestions khi click ra ngoài
    document.addEventListener('click', function(e) {
        if (!searchInput.contains(e.target) && !searchSuggestions.contains(e.target)) {
            searchSuggestions.style.display = 'none';
        }
    });
    
    // Ẩn suggestions khi submit form
    searchInput.addEventListener('input', function() {
        if (this.value.length > 0) {
            searchSuggestions.style.display = 'none';
        } else {
            searchSuggestions.style.display = 'block';
        }
    });
});
</script>