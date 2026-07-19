<x-guest-layout>
    <!-- Session Status -->

    <x-auth-session-status class="mb-4" :status="session('status')" />
    <div>
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($error->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
    </div>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        Admin login
    </div>
    <form method="POST" action="{{ route('two-factor.login') }}">
        @csrf

        <div class="col-4">
            <input type="text" class="from-control" name="code" placeholder="Enter your authentication code" autofocus
            >
        </div>

        <div class="col-4">
            <input type="text" class="from-control" name="recovery_code" placeholder="Enter your recovery code" autofocus
            >
        </div>
        <div class="col-4 mt-3">
            <button type="submit" class="btn btn-primary ">log in</button>
        </div>
        
    </form>
</x-guest-layout>
