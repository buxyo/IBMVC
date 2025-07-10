<?php

// File: App/Models/HomeModel.php

declare(strict_types=1);

namespace App\Models;

use Core\Model;

class HomeModel extends Model
{
    public function getWelcomeMessage(): string
    {
        return "Welcome to IBMVC from HomeModel!";
    }
}