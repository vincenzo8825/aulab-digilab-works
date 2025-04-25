<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Symfony\Component\HttpFoundation\Response;

class OptimizeImages
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        // Procede solo se è una richiesta di upload immagine
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $image = $request->file('image');

            $img = Image::make($image->path());

            if ($img->width() > 1200) {
                $img->resize(1200, null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
            }

            // Ottimizza la qualità dell'immagine
            $img->save($image->path(), 80);
        }

        return $response;
    }
}
