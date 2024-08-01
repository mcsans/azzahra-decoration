@if (session('success'))
    <div class="sweetalert" data-icon="success" data-title="Success" data-text="{{ session('success') }}"></div>
@endif
@if (session('error'))
    <div class="sweetalert" data-icon="error" data-title="Fail" data-text="{{ session('error') }}"></div>
@endif
