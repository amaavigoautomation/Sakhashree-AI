<?php

namespace App\Traits;

trait FileValidationTrait
{
    protected function validateRealFileType($file)
    {
        if (!$file || !$file->isValid()) {
            return false;
        }

        $path = $file->getRealPath();

        if (!$path || !file_exists($path)) {
            return false;
        }

        // Check real MIME
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $realMime = finfo_file($finfo, $path);
        finfo_close($finfo);

        // Check extension
        $extension = strtolower(
            $file->getClientOriginalExtension()
        );

        $allowedFiles = [
            'jpg' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'png' => 'image/png',
            'webp' => 'image/webp',
        ];

        if (!isset($allowedFiles[$extension])) {
            return false;
        }

        // Extension MIME must match
        if ($allowedFiles[$extension] !== $realMime) {
            return false;
        }

        return true;
    }
}
