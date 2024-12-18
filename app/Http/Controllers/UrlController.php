<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PharIo\Manifest\InvalidUrlException;
use App\Models\Url;
use Inertia\Inertia;

class UrlController extends Controller
{
    //
    public function store(Request $request)
    {
        $url = $request->input('url');
        if($this->checkUrl($url)){
            do{
                $uniqueString =  $this->generateUniqueString();
            }while(Url::where('short_code',$uniqueString)->exists());

           $newUrl = new Url;
           $newUrl->short_code = $uniqueString;
           $newUrl->original_url = $url;
           $newUrl->save();
           return Inertia::render('Home', [
            'shortUrl' =>  $uniqueString,
        ]);
        }else{
            return Inertia::render('Home', [
                'message' => 'La URL no es válida. Inténtalo de nuevo.',
            ]);
        }
    }
    private function  checkUrl($url): bool {
        $existe = false;
        $headers = @get_headers($url);
        return $headers && strpos($headers[0], '404') === false;
    }
    private function generateUniqueString(){
        $caracteres_permitidos = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $longitud = 6;
       return substr(str_shuffle($caracteres_permitidos), 0, $longitud);

    }
    public function redirectToOriginal($shortcode)
{

    $url = Url::where('short_code', $shortcode)->first();

    if ($url) {
        return redirect($url->original_url);
    }}
}
