<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LazyLoadImages
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        if (!$request->isMethod('GET') || !is_string($response->getContent()) || !str_contains($response->headers->get('Content-Type') ?? '', 'text/html')) {
            return $response;
        }

        $content = $response->getContent();

        // Aggiunge loading="lazy" a tutte le immagini che non ce l'hanno già
        $content = preg_replace('/<img(?!.*?loading=)[^>]*>/i', '<img loading="lazy" $0', $content);

        $response->setContent($content);

        return $response;
    }
}
