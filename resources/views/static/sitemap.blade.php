@verbatim <?xml version="1.0" encoding="UTF-8"?> @endverbatim
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
    <url>
    <loc>{{config('app.url')}}</loc>
    <lastmod>{{ $pages[0]->updated_at->format("Y-m-d") }}</lastmod>
    <changefreq>monthly</changefreq>
    <priority>1.0</priority>
    </url>
    @foreach ($pages as $page)
        <url>
            @if ($page->slug === 'home')
                <loc>{{config('app.url').'/'.$page->location.'/'.$page->slug}}</loc>
            @else
                <loc>{{config('app.url').'/'.$page->location.'/templates/'.$page->slug}}</loc>
            @endif
            <lastmod>{{ $page->updated_at->format("Y-m-d") }}</lastmod>
            <changefreq>monthly</changefreq>
            <priority>0.9</priority>
        </url>
    @endforeach
</urlset>