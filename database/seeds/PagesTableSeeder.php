<?php

use Illuminate\Database\Seeder;
use App\Page;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Page::create([
            'location' => Page::LOC_EN,
            'slug' => 'home',
            'title' => 'Calculation and construction of templates for cutting pipes',
            'keywords' => 'Patterns for cutting pipes, patterns for welders',
            'description' => 'If there is no special equipment for cutting pipes, then with the help of our templates and patterns you can mark pipes for cutting with less specialized equipment.',
            'page_title' => 'Templates for cutting and marking pipes.',
            'intro_text' => 'Building templates for cutting and marking pipes.',
            'seo_text' => '<p>This site may be useful for welders, mechanics and other interested people. We provide an opportunity to build and print templates for free. For example, a template for cutting pipes at an angle.</p>
                <p>If you need to make a pipe with a bend, not having a pipe-bolt, then it can be welded from segments made using our templates.</p>
                <p>For comments and suggestions, write dmres.service@gmail.com, but if the site seemed to you at least a little useful, share with friends the link.</p>'
        ]);

        Page::create([
            'location' => Page::LOC_RU,
            'slug' => 'home',
            'title' => 'Расчет и построение шаблонов для резки труб',
            'keywords' => 'Шаблоны для резки труб, шаблоны для сварщиков',
            'description' => 'Если нет специального оборудования для резки труб, то с помощью наших шаблонов и лекал можно разметить трубы для разрезания менее специализированным оборудованием',
            'page_title' => 'Шаблоны для резки и разметки труб.',
            'intro_text' => 'Постройка шаблонов для резки и разметки труб.',
            'seo_text' => '<p>Этот сайт может быть полезен сварщикам, слесарям и другим интересующимся людям. Мы предоставляем возможность для бесплатного построения и распечатки шаблонов. Например шаблон для резки труб под углом.</p>
                <p>Если вам необходимо изготовить трубу с изгибом, не имея трубогтба, то ее можно сварить из сегментов изготовленных с помощью наших шаблонов.</p>
                <p>Для замечаний и предложений пишите dmres.service@gmail.com, ну а если сайт показался вам хоть немного полезным поделитесь со знакомыми ссылкой.</p>'
        ]);

        Page::create([
            'location' => Page::LOC_EN,
            'slug' => 'pipe-angle-cutting',
            'title' => 'Template, reamer for cutting pipe at an angle',
            'keywords' => 'Cutting of pipes according to a template, a template for cutting pipes at an angle',
            'description' => 'Template for cutting pipes at any angle, piece can be downloaded or printed',
            'page_title' => 'Construction of a template for cutting pipes at an angle',
            'intro_text' => 'Specify the desired angle and diameter of interest to you and get a scan for cutting pipes',
            'seo_text' => '<p>With this program you can calculate and build a template for cutting the pipe at an angle. Enter the pipe diameter you need and the angle at which you want to cut the pipe. The program will build a template (pattern) with which you can easily mark the pipe.</p>
                <p>The template shows the dimensions in millimeters, to match the entered dimensions and dimensions of the template after printing, you must specify the desired scale before starting the print scan for cutting pipes at an angle.</p>',
            'action' => 'Pipe template calc'
        ]);

        Page::create([
            'location' => Page::LOC_RU,
            'slug' => 'pipe-angle-cutting',
            'title' => 'Шаблон, развертка для резки трубы под углом',
            'keywords' => 'Резка труб по шаблону, лекало для резки труб под углом',
            'description' => 'Шаблон для резки труб под любым углом, лекало можно скачать или распечатать',
            'page_title' => 'Построение шаблона для резки труб под углом',
            'intro_text' => 'Укажите нужный угол и интересующий вас диаметр и получите развертку для резки труб',
            'seo_text' => '<p>С помощью данной программы вы можете расчитать и построить шаблон для резки трубы под углом. Введите нужный вам диаметр трубы и угол под которым необходимо разрезать трубу. Программа построит шаблон(лекало) с помощью которого вы легко сможете разметить трубу.</p>
                <p>На шаблоне указаны размеры в милиметрах, для соответствия введенных размеров и размеров шаблона после печати, необходимо указать требуемый масштаб перед началом распечатки развертки для резки труб под углом.</p>',
            'action' => 'Расчитать шаблон'
        ]);
        
        Page::create([
            'location' => Page::LOC_EN,
            'slug' => 'image-generator',
            'title' => 'Download unique pictures, generator unique pictures',
            'keywords' => 'Image generator, unique image generator, image generator, images for testing',
            'description' => 'Service for creating unique pictures of various formats with any necessary resolution. The formats HD, Full Hd, 2k, 4k and others are included in advance.',
            'page_title' => 'Create images in any resolution.',
            'intro_text' => 'Here you can create and download unique images for free. The program generates images in resolution (HD, Full HD, 2k and ets)',
            'seo_text' => '<p>The service is designed to generate unique images. You can easily create pictures in the desired resolution and format. Based on the entered initial data, the service generates images of the specified resolution. You can download free images in HD, Full HD and other resolutions.</p>
                <p>If you need to specify the prefix for the image, the starting number for the generation, click apply and you can download the generated image.</p>',
            'action' => 'Create images'
        ]);

        Page::create([
            'location' => Page::LOC_RU,
            'slug' => 'image-generator',
            'title' => 'Скачать уникальные картинки, генератор уникальных картинок',
            'keywords' => 'Генератор картинок, генератор уникальных картинок, генератор изображений, картинки для тестирования',
            'description' => 'Сервис для создания уникальных картинок различных форматов с любым необходимым разрешением. Заранее включены форматы HD, Full Hd, 2k, 4k  и другие',
            'page_title' => 'Создать картинки в любом разрешении.',
            'intro_text' => 'Здесь вы можете создать и скачать уникальные картинки бесплатно. Программа генерирует изображения в разрешении (HD, Full HD, 2k и др.)',
            'seo_text' => '<p>Сервис предназначен для генерирования уникальных изображений. Вы легко сможете создать картинки в нужном разрешении и формате. На основе введенных  начальных данных сервис генерирует картинки указанного разрешения. Вы можете скачать бесплатно картинки в HD, Full HD и других разрешениях.</p>
                <p>Если необходимо укажите префикс для картинки, начальный номер для генерации, нажмите применить и можете скачать сгенерированную картинку.</p>',
            'action' => 'Создать картинки'
        ]);
    }
}
