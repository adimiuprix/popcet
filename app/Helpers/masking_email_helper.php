<?php

if (!function_exists('mask_email')) {
    function mask_email($email) {
        list($local, $domain) = explode('@', $email);
        $localLength = strlen($local);

        // Menampilkan 2 karakter pertama dan 4 karakter terakhir dari bagian lokal email
        if ($localLength <= 4) {
            $maskedLocal = str_repeat('*', $localLength);
        } else {
            $maskedLocal = substr($local, 0, 2) . str_repeat('*', $localLength - 2) . substr($local, -2);
        }

        return $maskedLocal . '@' . $domain;
    }
}
