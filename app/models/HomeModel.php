<?php

declare(strict_types=1);

namespace App\Models;

use Core\Model;
use PDO;

class HomeModel extends Model
{
    public function getWelcomeMessage(): string
    {
        return "Welcome to IBMVC from HomeModel!";
    }
}
