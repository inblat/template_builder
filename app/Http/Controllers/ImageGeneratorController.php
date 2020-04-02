<?php

namespace App\Http\Controllers;

use App;
use App\Page;
use App\Services\Lang;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ImageGeneratorController extends BaseController
{
    public function getImageGenerator($locale, Request $request) {
       
        App::setLocale($locale);
        $this->data['page'] = Page::where(['location' => $locale, 'slug' => 'image-generator'])->first();

        $this->data['lang'] = new Lang([
            'prefix' => trans('prop.prefix'),
            'number' => trans('prop.number'),
            'resolution' => trans('prop.resolution'),
            'apply' => trans('actions.apply'),
            'next_image' => trans('actions.next_image'),
        ]);
        
        return view('templates.image_generator', $this->data);
    }

    public function postData(Request $request) {
        $locale = session()->get('locale', 'en');
        App::setLocale($locale);


        $resolution = $request->get('resolution');
        $scale = $resolution['height']/1080;
        $point = $resolution['height']/100;
        $fontSize = round($resolution['height']/7);
        $fontSizeResolution = round($resolution['height']/20);
        $fontSizeCreated = round($resolution['height']/50);
        $number = $request->get('prefix', '') . str_pad($request->get('number'), 4, '0', STR_PAD_LEFT);
        $dateNow = Carbon::now()->setTimezone($request->get('timezone', 'Europe/Minsk'));
        $createdText = ' Created by ' . env('APP_URL') . ' ' . $dateNow->format('d/m/Y - G:i:s');
        $path = [
            0, 0,
            $resolution['width'], 0,
            $resolution['width'], $resolution['height'],
            0, $resolution['height']
        ];

        return response()->json([
            "success" => true,
            "data" => [
                'pathes' => [$path],
                'texts' => [
                    [
                        'text' => $number,
                        'x' => $resolution['width']/2 - (mb_strlen($number) * $fontSize * 0.3),
                        'y' => $resolution['height']/2 - ($fontSize/2),
                        'style' => [
                            'fontFamily' => 'Arial',
                            'fontSize' => $fontSize,
                            'fill' => 'orange',
                            'stroke' => '#444444',
                            'strokeThickness' => 5 * $scale
                        ]
                    ],
                    [
                        'text' => $resolution['name'],
                        'x' => $point * 5,
                        'y' => $point * 5 ,
                        'style' => [
                            'fontFamily' => 'Arial',
                            'fontSize' => $fontSizeResolution,
                            'fill' => 'gray',
                            'stroke' => '#444444',
                            'strokeThickness' => 3 * $scale
                        ]
                    ],
                    [
                        'text' => $createdText,
                        'x' => $resolution['width'] - (mb_strlen($createdText) * $fontSizeCreated * 0.5),
                        'y' => $resolution['height'] - 2 * $fontSizeCreated,
                        'style' => [
                            'fontFamily' => 'Arial',
                            'fontSize' => $fontSizeCreated,
                            'fill' => 'gray',
                            'stroke' => '#444444',
//                            'strokeThickness' => 3 * $scale
                        ]
                    ]
                ],
                'view' => [
                    'params' => [
                        'width' => $resolution['width'],
                        'height' => $resolution['height'],
                        'backgroundColor' => '0x448899'
                    ]
                ]
            ]
        ]);
    }
}
