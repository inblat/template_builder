<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Page;
use App\Product;

class Sitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('Start generate sitemap');
        $pages = Page::all();
        $v = view('static.sitemap', ['pages' => $pages]);
        file_put_contents(public_path('sitemap.xml'), $v->render());
        $this->info('Finish generate sitemap');
    }
}
