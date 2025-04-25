<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CompressHtml
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        // Comprimi solo le risposte HTML
        if (!$request->isMethod('GET') || !str_contains($response->headers->get('Content-Type') ?? '', 'text/html')) {
            return $response;
        }

        $content = $response->getContent();

        $search = [
            '/\>[^\S ]+/s',
            '/[^\S ]+\</s',
            '/(\s)+/s',
            '/<!--(.|\s)*?-->/'
        ];

        $replace = ['>', '<', '\\1', ''];

        $minified = preg_replace($search, $replace, $content);

        if ($minified !== null) {
            $response->setContent($minified);
        }

        return $response;
    }
}
