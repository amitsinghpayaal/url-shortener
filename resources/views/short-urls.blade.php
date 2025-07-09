<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Short URLs
        </h2>
    </x-slot>

    <div class="py-12 container">
        @if(in_array(auth()->user()->role, ['Admin', 'Member']))
        <form method="POST" action="/short-urls" style="margin-bottom: 20px;">
            @csrf
            <label>Original URL: <input type="url" name="original_url" required></label>
            <button class="btn btn-info" type="submit">Create Short URL</button>
        </form>
        @endif
        <h3>Your Short URLs</h3>
        <table class="table table-bordered" border="1">
            <tr>
                <th>ID</th>
                <th>Short Url</th>
                <th>Original URL</th>
                <th>Created By</th>
            </tr>
            @foreach($shortUrls as $url)
            <tr>
                <td>{{ $url->id }}</td>
                <td>{{ url($url->short_code) }}</td>
                <td>{{ $url->original_url }}</td>
                <td>{{ $url->user->name ?? 'N/A' }}</td>
            </tr>
            @endforeach
        </table>
    </div>
</x-app-layout> 