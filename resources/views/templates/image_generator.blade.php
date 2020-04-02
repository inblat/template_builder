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
        <image-generator-input v-on:render="render" :lang="{{ $lang->toJson() }}"></image-generator-input>
@endsection

@section('view')
    <div class="row">
        <div class="col-3">
            <div id="canvas" style="visibility: hidden; height: 0; overflow: hidden;">

            </div>
            <a class="btn btn-primary btn-block" id="downloadLnk" download="template.png">@lang('actions.download')</a>
        </div>
    </div>
@endsection