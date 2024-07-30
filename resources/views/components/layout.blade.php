<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite('resources/css/app.css')
    <title>Studnets-tips</title>
</head>

<body class="bg-gradient-to-r from-blue-100 to-indigo-100 mx-auto mt-10 text-2xl max-w-2xl" >
    @if(session('success'))
        <div class="bg-green-300 opacity-75 border border-l-4 border-green-600 rounded-md mb-4 p-4">
            <div role="alert" class="text-lg">Success!</div>
            <div class="text-sm" class="text-lg">{{ session('success') }}</div>

        </div>
    @endif
    @if(session('error'))
        <div class="bg-red-300 opacity-75 border border-l-4 border-red-600 rounded-md mb-4 p-4">
            <div class="ml-2 font-bold">
                <div role="alert" class="text-lg">Error!</div>
                <div class="text-sm" class="text-lg">{{ session('error') }}</div>
            </div>
        </div>
    @endif
    <div class="flex justify-between items-center">
        <div class="mb-2 flex flex-col gap-4">
            <a class="block text-4xl text-bold font-serif" href="{{ route('faculties.index') }}">
                Students Tips
            </a>
            @if(!$mark)
                <a href="{{ route('mark.index') }}" class="text-slate-500 hover:underline">Mark</a>
            @endif
        </div>
        @if(Auth::check() && auth() -> user())
            <div class="flex flex-col justify-end items-end">
                <div class="text-lg text-slate-600 w-fit flex gap-2 font-medium">
                    <p class="text-slate-500">{{ auth() -> user() -> name}}: </p>
                    <a href="{{ route('user.edit', auth() -> user()) }}" class="hover:underline">My Account</a>
                    <form action="{{ route('auth.destroy') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="hover:underline">Logout</button> 
                    </form>
                </div>
                @if(Auth::check() && auth() -> user() -> admin)
                    <a href="{{ route('user.create') }}" class="mb-4 block text-lg text-slate-600 w-fit font-medium hover:underline">Make new accounts</a>
                @endif
            </div>
            @else
            <div class="text-lg text-slate-600 w-fit flex gap-2 font-medium">
                <a href="{{ route('auth.create') }}" class="hover:underline">Login</a>
                <a href="{{ route('user.create') }}" class="hover:underline">Signup</a>
            </div>
            @endif
            
    </div>
    {{ $slot }}
</body>
</html> 