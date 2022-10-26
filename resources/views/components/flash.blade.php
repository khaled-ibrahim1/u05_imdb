@if (session()->has('success'))
<div class="alert alert-{{ session('color')}} m-0 alert-dismissible fade show" role="alert" x-data="{ show: true}" x-init="setTimeout(() => show = false, 4000)" x-show="show">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif