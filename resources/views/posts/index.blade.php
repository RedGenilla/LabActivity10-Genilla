@extends('layouts.app')

@section('title', 'Barangay Bulletin - Purok Genilla')

@section('content')

<div class="space-y-6">

    <!-- Page heading -->
    <div>
        <h1 class="text-3xl font-bold text-blue-900">
            Barangay Bulletin
        </h1>
        <p class="mt-2 text-gray-600">
            Latest announcements from Purok Genilla.
        </p>
    </div>

    <!-- Search and category filter -->
    <form method="GET"
          action="{{ route('posts.index') }}"
          class="flex flex-col sm:flex-row gap-3 bg-white p-4 rounded-lg shadow">

        <!-- Search by post title -->
        <input
            type="text"
            name="q"
            value="{{ request('q') }}"
            placeholder="Search announcements..."
            class="w-full rounded border border-gray-300 px-4 py-2"
        >

        <!-- Filter by category -->
        <select
            name="category"
            class="w-full sm:w-56 rounded border border-gray-300 px-4 py-2"
        >
            <option value="">All Categories</option>

            @foreach ($categories as $category)
                <option value="{{ $category }}"
                    {{ request('category') == $category ? 'selected' : '' }}>
                    {{ $category }}
                </option>
            @endforeach
        </select>

        <button
            type="submit"
            class="rounded bg-blue-800 px-6 py-2 text-white hover:bg-blue-900">
            Filter
        </button>
    </form>

    <!-- Bulletin posts -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

        @forelse ($posts as $post)

            <article class="rounded-lg bg-white p-5 shadow">

                <!-- Category and pinned badge -->
                <div class="mb-3 flex flex-wrap items-center gap-2">

                    <span class="rounded bg-blue-100 px-3 py-1 text-sm text-blue-800">
                        {{ $post->category }}
                    </span>

                    @if ($post->is_pinned)
                        <span class="rounded bg-yellow-100 px-3 py-1 text-sm font-semibold text-yellow-800">
                            Pinned
                        </span>
                    @endif

                </div>

                <!-- Post title -->
                <h2 class="text-xl font-bold text-gray-900">
                    <a href="{{ route('posts.show', $post->id) }}"
                       class="hover:text-blue-700">
                        {{ $post->title }}
                    </a>
                </h2>

                <!-- Publication date -->
                <p class="mt-2 text-sm text-gray-500">
                    Published:
                    {{ $post->published_at?->format('M d, Y') ?? 'N/A' }}
                </p>

                <!-- View counter -->
                <p class="mt-1 text-sm text-gray-500">
                    Views: {{ $post->views }}
                </p>

                <!-- Link to full announcement -->
                <a href="{{ route('posts.show', $post->id) }}"
                   class="mt-4 inline-block font-medium text-blue-700 hover:underline">
                    Read Announcement
                </a>

            </article>

        @empty

            <p class="text-gray-600 md:col-span-2">
                No posts match your search.
            </p>

        @endforelse

    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $posts->links() }}
    </div>

    <!-- Pagination summary -->
    <p class="text-sm text-gray-600">
        Showing {{ $posts->firstItem() ?? 0 }}
        –{{ $posts->lastItem() ?? 0 }}
        of {{ $posts->total() }} posts
    </p>

</div>

@endsection
