<?php

namespace App\Http\Controllers;

use App;
use App\Page;
use Illuminate\Http\Request;

class PipeController extends BaseController
{
    public function getPipeСut($locale) {
        App::setLocale($locale);
        $this->data['page'] = Page::where(['location' => $locale, 'slug' => 'pipe-angle-cutting'])->first();

        return view('templates.pipe_cut', $this->data);
    }

    public function postDataCut(Request $request) {
        $locale = session()->get('locale', 'en');
        App::setLocale($locale);
        $input = $request->all();
        $diameter = (integer)$input['diameter'];
        $r = $diameter/2;
        $angle = (integer)$input['angle'];
        $delta = 32;
        $l = 2 * M_PI * $r;
        $dx = $l/$delta;
        $correctY = 0;
        $marginX = 0;
        $pipeLength = 10;
        $currentX = $marginX;
        $currentY = $correctY;
        $path = [$currentX, $currentY];
        $path[] = $currentX;
        $path[] = $currentY - $pipeLength;
        for ($i = 1; $i <= $delta/2; $i++) {
            $currentX += $dx;
            $currentY = - $pipeLength -(1 + cos(M_PI - $i * M_PI/($delta/2))) * $r * tan(M_PI * $angle/180);
            $path[] = $currentX;
            $path[] = $currentY + $correctY;
        }
        for ($i = (-1 + $delta/2); $i >= 0; $i--) {
            $currentX += $dx;
            $currentY =  - $pipeLength -(1 + cos(M_PI - $i * M_PI/($delta/2))) * $r * tan(M_PI * $angle/180);
            $path[] = $currentX;
            $path[] =$currentY + $correctY;
        }
        $path[] = $currentX;
        $path[] = $correctY;
        $path[] = 0;
        $path[] = $correctY;

        foreach($path as &$v) {
            $v = round($v, 2);
        }

        $maxWidth = round($l, 2);
        $arrowMargin = 0.3;
        $arrowWidth = 3;
        $arrowHeight = 1.5;
        $scalePath = [
            $arrowMargin , 0,
            $arrowWidth, -$arrowHeight,
            $arrowMargin, 0,
            $arrowWidth, $arrowHeight,
            $arrowMargin , 0,
            $maxWidth - $arrowMargin, 0,
            $maxWidth - $arrowWidth - $arrowMargin, -$arrowHeight,
            $maxWidth - $arrowMargin, 0,
            $maxWidth - $arrowWidth - $arrowMargin, $arrowHeight,
            $maxWidth - $arrowMargin, 0
        ];

        return response()->json([
            "pathes" => [$path, $scalePath],
            "maxWidth" => $maxWidth,
            "maxHeight" => (2 * $r * tan(M_PI * $angle/180) + $pipeLength),
            "diameter" => trans('prop.diameter') . ': ' . $diameter . ', ' . trans('units.mm'),
            "angle" => trans('prop.angle') . ': ' . $angle . trans('units.deg'),
        ]);
    }
}
