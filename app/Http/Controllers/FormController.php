<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\GenerateJsonRequest;
use Storage;

class FormController extends Controller {
    public function index(Request $request) {
        if ( session('success') ) {
            $file = Storage::url( session('file') );
        } else {
            $file = null;
        }

        return view( 'form', compact('request', 'file') );
    }

    public function generateJSON(GenerateJsonRequest $request) {
        $data = [
            'url' => $request->url,
            'reload_timeout' => $request->reloadTimeout,
            'screen_orientation' => $request->screenOrientation,
            'screensaver' => [
                'screensaver_timeout' => $request->screenSaverTimeout,
                'screensaver_delay' => $request->screenSaverDelay,
                'screensaver_items' => [
                    ['type' => 'image', 'url' => $request->screenSaverImage1],
                    ['type' => 'image', 'url' => $request->screenSaverImage2],
                    ['type' => 'image', 'url' => $request->screenSaverImage2]
                ]
            ]
        ];
        $file = date('Y-m-d-H-i-s') . '.json';

        Storage::disk('public')->put( $file, json_encode($data, JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT) );
        $request->session()->flash('success', true);
        $request->session()->flash('file', $file);

        return redirect('/');
    }
}
