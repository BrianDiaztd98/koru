<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SecurityHeaders
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        $response->headers->set(
            'Permissions-Policy',
            'accelerometer=(), camera=(), geolocation=(), gyroscope=(), magnetometer=(), microphone=(), payment=(), usb=()'
        );

        // Caché moderada para HTML: permite reutilizar la página en visitas repetidas
        // pero fuerza revalidación cuando el contenido pudo cambiar.
        if ($response->headers->get('Content-Type') === 'text/html; charset=UTF-8') {
            $response->headers->set('Cache-Control', 'public, max-age=3600, must-revalidate');
        }

        // Caché larga para assets estáticos versionados (imágenes, CSS, JS, fuentes).
        // Vite genera hashes en el nombre de archivo, por lo que son inmutables.
        if (preg_match('/\.(ico|jpe?g|png|gif|webp|svg|css|js|woff2?|ttf|eot|otf|pdf|mp4|webm|mp3)(\?.*)?$/i', $request->getPathInfo())) {
            $response->headers->set('Cache-Control', 'public, max-age=31536000, immutable');
        }

        return $response;
    }
}
