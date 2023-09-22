<?php

namespace Feralonso\Tests\Helper;

class FileHelper
{
    private const PATH_RESPONSES = __DIR__ . '/../Response/';

    public static function getResponsesProvider(array $files): array
    {
        return array_map(static fn (string $content): array => [$content], self::getResponses($files));
    }

    private static function getResponses(array $files): array
    {
        $result = [];

        foreach ($files as $file) {
            if (is_scalar($file)) {
                $filePath = self::PATH_RESPONSES . $file;
                if (file_exists($filePath)) {
                    $fileContent = file_get_contents($filePath);
                    if ($fileContent) {
                        $result[] = $fileContent;
                    }
                }
            }
        }

        return $result;
    }
}
