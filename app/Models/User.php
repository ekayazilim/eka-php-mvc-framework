<?php
namespace EkaYazilim\app\Models;

use EkaYazilim\core\EkaModel;

class User extends EkaModel {
    protected string $table = 'users';

    public function findByEmail(string $email): ?array {
        $result = $this->where('email', '=', $email);
        return $result[0] ?? null;
    }
}
