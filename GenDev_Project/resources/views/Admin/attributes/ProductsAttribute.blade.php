@extends('Admin.layouts.master-without-page-title')

@section('title', 'Quản lý Thuộc tính')

@section('content')

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="mb-0">Quản lý thuộc tính</h3>
            <form action="{{ route('admin.attributes.index') }}" method="GET" style="max-width: 300px; width: 100%;">
                <div class="input-group">
                    <input type="text" name="keyword" class="form-control" placeholder="Tìm kiếm thuộc tính..."
                        value="{{ request('keyword') }}">
                    <button type="submit" class="btn btn-outline-secondary">Tìm</button>
                </div>
            </form>
        </div>

        <div class="card-body py-3 d-flex justify-content-between align-items-center">
            <a href="{{ route('admin.attributes.create') }}" class="btn btn-outline-primary mb-3"><i
                    class="fas fa-plus me-1"></i>Thêm thuộc tính</a>
            <a href="{{ route('admin.attributes.trashList') }}"
                class="btn btn-outline-danger mb-3 float-end position-relative">
                <i class="fa fa-trash me-1"></i>Thùng rác
                @if ($trashCount > 0)
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        {{ $trashCount }}
                    </span>
                @endif
            </a>
        </div>

        <!-- Attributes List -->
        <div class="card-body table-responsive">
            <div class="table align-middle text-center">
                <div class="accordion" id="attributesAccordion">
                    @forelse ($attributes as $attribute)
                        <div class="accordion-item mb-3 border-0 rounded-3 overflow-hidden shadow-sm">
                            <h2 class="accordion-header" id="heading{{ $attribute->id }}">
                                <div
                                    class="d-flex justify-content-between align-items-center px-3 py-2 bg-light bg-opacity-10">
                                    <button class="accordion-button collapsed bg-transparent shadow-none flex-grow-1 me-3"
                                        type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse{{ $attribute->id }}" aria-expanded="false"
                                        aria-controls="collapse{{ $attribute->id }}">
                                        <div class="d-flex align-items-center">
                                            <div class="me-2">
                                                <i class="fas fa-tag text-primary"></i>
                                            </div>
                                            <div>
                                                <strong class="d-block">{{ $attribute->name }}</strong>
                                                <small class="text-muted">ID: {{ $attribute->id }}</small>
                                            </div>
                                        </div>
                                    </button>

                                    <div class="d-flex align-items-center gap-2">
                                        <a href="{{ route('admin.attributes.edit', $attribute->id) }}"
                                            class="btn btn-sm btn-outline-warning rounded-pill px-3 d-flex align-items-center justify-content-center"
                                            style="height: 32px;" data-bs-toggle="tooltip" title="Chỉnh sửa">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.attributes.trash', $attribute->id) }}" method="POST"
                                            class="delete-form mb-0 d-flex align-items-center">
                                            @csrf
                                            <button type="submit"
                                                class="btn btn-sm btn-outline-danger rounded-pill px-3 d-flex align-items-center justify-content-center"
                                                style="height: 32px;" data-bs-toggle="tooltip" title="Chuyển vào thùng rác">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </h2>

                            <div id="collapse{{ $attribute->id }}" class="accordion-collapse collapse"
                                aria-labelledby="heading{{ $attribute->id }}" data-bs-parent="#attributesAccordion">
                                <div class="accordion-body bg-light bg-opacity-10">
                                    @if ($attribute->values->count())
                                        <div class="d-flex flex-wrap gap-2">
                                            @foreach ($attribute->values as $value)
                                                <span
                                                    class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-3 py-1">
                                                    <i class="fas fa-circle-small me-1"></i>
                                                    {{ $value->value }}
                                                </span>
                                            @endforeach
                                        </div>
                                    @else
                                        <span class="badge bg-light text-muted rounded-pill px-3 py-1">
                                            <i class="fas fa-info-circle me-1"></i> Chưa có giá trị
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-5">
                            <div class="py-5">
                                <i class="fas fa-tags fa-4x text-muted mb-4 opacity-25"></i>
                                <h5 class="text-muted mb-3">Không có thuộc tính nào</h5>
                                <p class="text-muted small mb-4">Bắt đầu bằng cách thêm thuộc tính mới</p>
                                <a href="{{ route('admin.attributes.create') }}"
                                    class="btn btn-primary btn-sm rounded-pill px-3">
                                    <i class="fas fa-plus me-1"></i> Thêm thuộc tính
                                </a>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>

    {{-- SweetAlert2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- Flash Message --}}
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Thành công!',
                text: '{{ session('success') }}',
                confirmButtonColor: '#3085d6',
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Lỗi!',
                text: '{{ session('error') }}',
                confirmButtonColor: '#d33',
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });
        </script>
    @endif

    {{-- Xác nhận khi xóa --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize tooltips
            const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            const tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });

            // Delete confirmation
            document.querySelectorAll('.delete-form').forEach(form => {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    Swal.fire({
                        title: 'Xác nhận xóa',
                        text: 'Thuộc tính sẽ được chuyển vào thùng rác!',
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#6c757d',
                        confirmButtonText: 'Xác nhận',
                        cancelButtonText: 'Hủy bỏ',
                        reverseButtons: true,
                        backdrop: `rgba(0,0,0,0.2)`
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>

    <style>
        .accordion-button:not(.collapsed) {
            background-color: rgba(78, 115, 223, 0.05);
            color: inherit;
        }

        .accordion-button:focus {
            box-shadow: none;
            border-color: transparent;
        }

        .badge {
            font-weight: 500;
        }

        .btn-sm {
            padding: 0.35rem 0.75rem;
        }

        .fa-circle-small {
            font-size: 0.5rem;
            vertical-align: middle;
        }

        .accordion-header .btn {
            padding: 0 !important;
            width: 36px;
            height: 32px;
        }

        .input-group-sm .form-control {
            height: 32px;
            font-size: 0.875rem;
        }

        .input-group-sm .input-group-text {
            height: 32px;
            padding: 0.25rem 0.5rem;
        }
    </style>
@endsection
