<html>
    <head>
        <title>Add New Linux Distribution</title>
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
    </head>
    <body class="bg-[#1e1e2e] font-sans antialiased">
        <div class="p-6 text-[#4c4f69]">
            <h1 class="text-3xl font-bold mb-6 text-[#04a5e5]">Add New Linux Distribution</h1>

            @if ($errors->any())
            <div class="mb-4 bg-[#f38ba8] text-[#1e1e2e] p-4 rounded">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                    <li class="text-sm">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('create-distro') }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label for="name" class="block text-sm font-medium text-[#89b4fa] mb-1">Distribution Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}"
                        class="w-full px-4 py-2 rounded border border-gray-300 bg-[#1e1e2e] text-[#cdd6f4] focus:outline-none focus:ring-2 focus:ring-[#89dceb]"
                        required>
                    @error('name')
                    <p class="text-sm text-[#f38ba8] mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="version" class="block text-sm font-medium text-[#89b4fa] mb-1">Version</label>
                    <input type="text" id="version" name="version" value="{{ old('version') }}"
                        class="w-full px-4 py-2 rounded border border-gray-300 bg-[#1e1e2e] text-[#cdd6f4] focus:outline-none focus:ring-2 focus:ring-[#89dceb]">
                    @error('version')
                    <p class="text-sm text-[#f38ba8] mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="home_url" class="block text-sm font-medium text-[#89b4fa] mb-1">Homepage URL</label>
                    <input type="text" id="home_url" name="home_url" value="{{ old('home_url') }}"
                        class="w-full px-4 py-2 rounded border border-gray-300 bg-[#1e1e2e] text-[#cdd6f4] focus:outline-none focus:ring-2 focus:ring-[#89dceb]">
                    @error('home_url')
                    <p class="text-sm text-[#f38ba8] mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="package_manager" class="block text-sm font-medium text-[#89b4fa] mb-1">Package Manager</label>
                    <input type="text" id="package_manager" name="package_manager" value="{{ old('package_manager') }}"
                        class="w-full px-4 py-2 rounded border border-gray-300 bg-[#1e1e2e] text-[#cdd6f4] focus:outline-none focus:ring-2 focus:ring-[#89dceb]">
                    @error('package-manager')
                    <p class="text-sm text-[#f38ba8] mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit"
                    class="bg-[#89dceb] hover:bg-[#94e2d5] text-[#1e1e2e] px-4 py-2 rounded mt-4 font-medium">
                    Add Distribution
                </button>
            </form>

            <div class="mt-6">
                <a href="{{ route('get-distro') }}" class="text-[#89b4fa] hover:underline">
                    ← Back to All Distributions
                </a>
            </div>
        </div>

    </body>
</html>
