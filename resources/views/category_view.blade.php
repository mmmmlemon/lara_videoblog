@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="white-bg has-text-centered">
            {{-- наименование категории --}}
            <h1 class="title post_title">{{$categ->category_name}}</h1>
        </div>
        {{-- если есть посты то выводим их --}}
        @if(count($posts) > 0)
            <div class="">
                @foreach($posts as $post)
                    @yield('post', View::make('post_template', compact('post')))
                @endforeach
            </div>
            <div>
                {{ $posts->links('pagination.default') }}
            </div>
        {{-- если нет постов, то выводим плашку --}}
        @else
            <div class="white-bg has-text-centered">
                <h1 class="title">Nothing to see here yet</h1>
                <i class="fas fa-hand-peace"></i>
                <h1 class="subtitle">Come again later</h1>
            </div>
        @endif
    </div>
@endsection

{{-- модальные окна --}}
@section('modals')
    <div class="modal" id="img-modal">
        <div class="modal-background"></div>
        <div class="modal-content column is-two-thirds-desktop is-12-mobile">
            <p class="image has-text-centered">
                <div class="has-text-centered">
                    <img id="img-in-modal" width="90%" src="" alt="">
                    <br>
                    <a id="link-in-modal" target="_blank" href="">Download</a>
                </div>
            </p>
        </div>
        <button class="modal-close is-large" id="modal-close" aria-label="close"></button>
    </div>
@endsection

@push('scripts')
{{-- Plyr --}}
<script src="{{ asset('js/plyr.js') }}"></script>
{{-- скрипты для этой страницы --}}
<script src="{{ asset('js/custom/category_view.js') }}"></script>
<script src="{{ asset('js/custom/shared/shared.js') }}"></script>
@endpush