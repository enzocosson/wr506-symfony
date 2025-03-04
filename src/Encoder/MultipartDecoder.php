<?php
// api/src/Encoder/MultipartDecoder.php

namespace App\Encoder;

use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Serializer\Encoder\DecoderInterface;

final class MultipartDecoder implements DecoderInterface
{
    public const FORMAT = 'multipart';

    public function __construct(private RequestStack $requestStack)
    {
    }

    public function decode(string $data, string $format, array $context = []): ?array
    {
        $request = $this->requestStack->getCurrentRequest();

        if (!$request) {
            return null;
        }

        return array_map(static function ($element) {
            // Vérifiez si $element est une chaîne de caractères avant de la traiter.
            if (is_string($element)) {
                // Multipart form values will be encoded in JSON.
                $decoded = json_decode($element, true);
        
                return is_array($decoded) ? $decoded : $element;
            }
        
            // Si ce n'est pas une chaîne de caractères, retournez directement l'élément.
            return $element;
        }, $request->request->all()) + $request->files->all();
        
    }

    public function supportsDecoding(string $format): bool
    {
        return self::FORMAT === $format;
    }
}