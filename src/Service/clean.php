<?php


namespace App\Service;


use App\Controller\UserController;

class clean extends UserController {
    public function cleanString($string) {
        $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

        return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
    }
}