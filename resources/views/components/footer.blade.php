<div style="height: 120px"></div>
<nav class="navbar navbar-expand-md navbar-dark fixed-bottom bg-dark">
    <div class="container-fluid text-center">
        {{--<image class="mx-auto" src="{{ asset('images/ad/ad2.png') }}"></image>--}}
        @if(false && env('APP_ENV') === 'prod')
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
        @if(env('APP_ENV') === 'prod')
            <script type="text/javascript">
                ( function() {
                    if (window.CHITIKA === undefined) { window.CHITIKA = { 'units' : [] }; };
                    var unit = {"calltype":"async[2]","publisher":"Aliaksandr84","width":728,"height":90,"sid":"Chitika Default"};
                    var placement_id = window.CHITIKA.units.length;
                    window.CHITIKA.units.push(unit);
                    document.write('<div id="chitikaAdBlock-' + placement_id + '"></div>');
                }());
            </script>
            <script type="text/javascript" src="//cdn.chitika.net/getads.js" async></script>
        @endif
        <p class="mx-auto">2018</p>
    </div>
</nav>
