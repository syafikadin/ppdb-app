@props(['name' => 'search', 'placeholder' => 'Cari...', 'value' => ''])

<div class="position-relative" style="min-width: 260px;">
    <i class="bi bi-search position-absolute top-50 start-0 translate-middle-y ms-3 text-muted"></i>
    <input type="text" name="{{ $name }}" value="{{ $value }}" placeholder="{{ $placeholder }}"
        class="form-control ps-5 admin-search-input" {{ $attributes }}>
</div>
