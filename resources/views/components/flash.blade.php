@if (session()->has('message'))
    <div x-data="{show:true}" x-init="setTimeout(()=>show=false, 5000)" x-show="show" class="fixed bg-laravel top-0 left-1/2 text-white transform -translate-x-1/2 px-48 py-3">
        <span>{{ session('message') }}</span>
    </div>
@endif
