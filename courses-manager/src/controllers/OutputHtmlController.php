<?php

namespace Mateus\MVC\controllers;

class OutputHtmlController {
    public function renderHtml(string $path, array $data): void{
        extract($data);

        require __DIR__ . '/../views/courses/' . $path;
    }
}