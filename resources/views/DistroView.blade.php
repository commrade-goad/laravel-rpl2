<html>
    <head>
        <title>Linux Distributions</title>
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
    </head>
    <body class="bg-[#1e1e2e] font-sans antialiased">
        <div class="p-6 text-[#4c4f69]">
            <h1 class="text-3xl font-bold mb-6 text-[#04a5e5]">Linux Distributions</h1>

            @if(count($distros) > 0)
            <div class="overflow-x-auto">
                <table class="min-w-full border border-gray-300 divide-y divide-gray-200 rounded-lg">
                    <thead class="bg-[#04a5e5] text-[#1e1e2e]">
                        <tr>
                            <th class="px-4 py-2 text-left text-sm font-bold ">Name</th>
                            <th class="px-4 py-2 text-left text-sm font-bold ">Version</th>
                            <th class="px-4 py-2 text-left text-sm font-bold ">Package Manager</th>
                            <th class="px-4 py-2 text-left text-sm font-bold ">Homepage</th>
                            <th class="px-4 py-2 text-left text-sm font-bold ">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 text-[#cdd6f4]">
                        @foreach($distros as $distro)
                        <tr class="hover:bg-[#585b70]">
                            <td class="px-4 py-2">{{ $distro->name }}</td>
                            <td class="px-4 py-2">{{ $distro->version }}</td>
                            <td class="px-4 py-2">{{ $distro->package_manager }}</td>
                            <td class="px-4 py-2">
                                @if($distro->home_url)
                                <a href="{{ $distro->home_url }}" class="text-[#89b4fa] hover:underline" target="_blank">
                                    {{ $distro->home_url }}
                                </a>
                                @else
                                <span class="text-gray-500">No home url available</span>
                                @endif
                            </td>
                            <td class="px-4 py-2 space-x-2">
                                <form action="{{ route('delete-distro', $distro->id) }}" method="POST" class="inline">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $distro->id }}">
                                    <button type="submit" class="bg-[#f38ba8] hover:bg-[#f5c2e7] text-[#1e1e2e] px-3 py-1 rounded text-sm">
                                        Delete
                                    </button>
                                </form>
                                <form action="{{ route('edit-distro', $distro->id) }}" method="GET" class="inline">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $distro->id }}">
                                    <button type="submit" class="bg-[#f9e2af] hover:bg-[#fab387] text-[#1e1e2e] px-3 py-1 rounded text-sm">
                                        Edit
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-6">
                <form action="{{ route('add-distro') }}" method="GET">
                    <button type="submit" class="bg-[#89dceb] hover:bg-[#94e2d5] text-[#1e1e2e] px-4 py-2 rounded">
                        Add Distro
                    </button>
                </form>
            </div>
            @else
            <p class="text-gray-600">No distributions found.</p>
            @endif
        </div>

    </body>
</html>
