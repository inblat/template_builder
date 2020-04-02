@extends('layouts.app')

@section('content')
        <div class="row module-line">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="card-body">
                            <h1 class="card-title">{{ $page->page_title }}</h1>
                            <p class="card-text">{!! $page->seo_text !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--<div class="row module-line">--}}
            {{--<div class="col">--}}
                {{--<div class="module">--}}
                    {{--<h2>3333333333</h2>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        <div class="row">
            <div class="col">
                <div class="card">
                    <img class="card-img-top" src="{{ asset('images/pipa-angle.png') }}" style="max-height: 240px" alt="Pipe cut template">
                    <div class="card-body">
                        <h5 class="card-title">{{ $articles['pipe']->page_title }}</h5>
                        <p class="card-text">{{ $articles['pipe']->intro_text }}</p>
                        <a href="/{{ $locale }}/templates/{{ $articles['pipe']->slug }}" class="btn btn-primary">
                            {{ $articles['pipe']->action }}
                        </a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <img class="card-img-top" src="{{ asset('images/image-generator.png') }}" style="max-height: 240px" alt="Images generator">
                    <div class="card-body">
                        <h5 class="card-title">{{ $articles['image-generator']->page_title }}</h5>
                        <p class="card-text">{{ $articles['image-generator']->intro_text }}</p>
                        <a href="/{{ $locale }}/templates/{{ $articles['image-generator']->slug }}" class="btn btn-primary">
                            {{ $articles['image-generator']->action }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
@endsection

