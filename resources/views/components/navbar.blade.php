<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="/{{ $page->location }}/home">{{ config('app.name') }}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
            {{--<li class="nav-item active">--}}
                {{--<a class="nav-link" href="/">@lang('base.home') <span class="sr-only">(current)</span></a>--}}
            {{--</li>--}}
            {{--<li class="nav-item">--}}
                {{--<a class="nav-link" href="/{{app()->getLocale()}}/form-pipe">@lang('base.home')</a>--}}
            {{--</li>--}}
            {{--<li class="nav-item">--}}
                {{--<a class="nav-link disabled" href="#">Disabled</a>--}}
            {{--</li>--}}
            {{--<li>--}}
                {{--<image class="mx-auto" src="{{ asset('images/ad/ad1.png') }}"></image>--}}
            {{--</li>--}}
            <li>
                <div>
                    @if(env('APP_ENV') === 'prod')
                        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                        <!-- tb-top -->
                        <ins class="adsbygoogle"
                             style="display:inline-block;width:980px;height:120px"
                             data-ad-client="ca-pub-5593537496103174"
                             data-ad-slot="6840941065"></ins>
                        <script>
                            (adsbygoogle = window.adsbygoogle || []).push({});
                        </script>
                    @endif
                </div>
            </li>


        </ul>
        <div class="dropdown mr-5">
            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                @lang('base.language')
            </a>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                @foreach(config('languages') as $locale =>  $language)
                    <a class="dropdown-item" href="/{{ $locale }}/home">{{ $language }}</a>
                @endforeach

            </div>
        </div>
    </div>
</nav>
<div style="height: 120px">

</div>