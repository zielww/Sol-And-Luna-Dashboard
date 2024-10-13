<?php

namespace Core;

class Validator {
    public static function string($char, $min = 5, $max = 20): bool {
        $char = trim($char);
        return strlen($char) >= $min && strlen($char) <= $max;
    }

    public static function email($char): bool {
        return (bool) filter_var($char, FILTER_VALIDATE_EMAIL);
    }

    public static function number($num, $min = null, $max = null): bool {
        if (!is_numeric($num)) {
            return false;
        }

        if ($min !== null && $num < $min) {
            return false;
        }

        if ($max !== null && $num > $max) {
            return false;
        }

        return true;
    }

    public static function image($file): bool {
        // Check if the file is uploaded without errors
        if ($file['error'] !== UPLOAD_ERR_OK) {
            return false;
        }

        // Validate the MIME type
        $validMimeTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
        if (!in_array($file['type'], $validMimeTypes)) {
            return false;
        }

        // Validate file size (e.g., limit to 2MB)
        $maxFileSize = 2 * 1024 * 1024; // 2MB
        if ($file['size'] > $maxFileSize) {
            return false;
        }

        return true;
    }

    public static function images(array $files): bool {
        foreach ($files['tmp_name'] as $key => $tmpName) {
            if (!self::image([
                'error' => $files['error'][$key],
                'type' => $files['type'][$key],
                'size' => $files['size'][$key],
                'tmp_name' => $tmpName,
            ])) {
                return false; // If any image fails validation, return false
            }
        }
        return true; // All images are valid
    }
}
