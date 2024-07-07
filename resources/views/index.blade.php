<x-layout>
    <x-slot name="title">
        My BBS
    </x-slot>

    <h1>
        <span>My BBS</span>
        <a href="{{ route('posts.create' )}}">[Add]</a>
    </h1>
    <ul>
        @forelse ($posts as $post)
            {{-- <a href="/posts/{{ $index }}"> --}}
            <a href="{{ route('posts.show', $post) }}">
                <li>{{ $post->title }}</li>
            </a>
        @empty
            <li>
                投稿がありません。
            </li>
        @endforelse
    </ul>
    <@php
        phpinfo();
    @endphp
</x-layout>

