<?php
namespace EkaYazilim\core;

interface EkaMiddleware {
    public function handle(EkaRequest $request, EkaResponse $response): bool;
}
