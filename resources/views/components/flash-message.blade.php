@if (session('flashMessage'))
    <div class="alert alert-success">
        {{ session('flashMessage') }}
    </div>
    @endif