@extends('layouts.app')

@section('title', $post->title . ' - Purok Genilla')

@section('content')

<div class="mx-auto max-w-3xl">

    <!-- Back to bulletin -->
    <a href="{{ route('posts.index') }}"
       class="mb-6 inline-block text-blue-700 hover:underline">
        &larr; Back to Announcements
    </a>

    <!-- Full post -->
    <article class="rounded-lg bg-white p-6 shadow">

        <!-- Category and pinned status -->
        <div class="mb-4 flex flex-wrap items-center gap-2">

            <span class="rounded bg-blue-100 px-3 py-1 text-sm text-blue-800">
                {{ $post->category }}
            </span>

            @if ($post->is_pinned)
                <span class="rounded bg-yellow-100 px-3 py-1 text-sm font-semibold text-yellow-800">
                    Pinned Announcement
                </span>
            @endif

        </div>

        <!-- Post title -->
        <h1 class="text-3xl font-bold text-gray-900">
            {{ $post->title }}
        </h1>

        <!-- Post information -->
        <div class="mt-4 border-b pb-4 text-sm text-gray-500">

            <p>
                Published:
                {{ $post->published_at?->format('F d, Y') ?? 'N/A' }}
            </p>

            <p class="mt-1">
                Author ID: {{ $post->author_id }}
            </p>

            <p class="mt-1">
                Views: {{ $post->views }}
            </p>

        </div>

        <!-- Full announcement body -->
        <div class="mt-6 whitespace-pre-line leading-relaxed text-gray-700">{{ $post->body }}</div>

    </article>

</div>

@endsection

