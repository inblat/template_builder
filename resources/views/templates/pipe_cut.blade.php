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
        <div class="row">
            <div class="col">
                <form action="/pipe" method="post">
                    <div class="form-group">
                        <label for="radius">@lang('prop.diameter'), @lang('units.mm')</label>
                        <input id="radius" name="radius" type="number" class="form-control" v-model="form.diameter">
                        <label for="angle">@lang('prop.angle'), @lang('units.deg')</label>
                        <input id="angle" name="angle" type="number" class="form-control" v-model="form.angle">
                        <label for="calc"></label>
                        <input id="calc" type="button" class="form-control" value="@lang('actions.calc')" v-on:click="calculate()">
                    </div>
                </form>
            </div>
            <div class="col">
            </div>
            <div class="col">
            </div>
            <div class="col">
                {{--<div class="col">--}}
                    {{--<div class="card" style="width: 90%;">--}}
                        {{--<img class="card-img-top" src=".../100px180/" alt="Card image cap">--}}
                        {{--<div class="card-body">--}}
                            {{--<h5 class="card-title">Card title</h5>--}}
                            {{--<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>--}}
                            {{--<a href="#" class="btn btn-primary">Go somewhere</a>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            </div>
        </div>
        <div class="clearfix"></div>
@endsection

@section('view')
    <div class="row">
        <div class="col">
            <div id="canvas">

            </div>
            <a class="btn btn-primary btn-block" id="downloadLnk" download="template.png">@lang('actions.download')</a>
        </div>
    </div>
@endsection