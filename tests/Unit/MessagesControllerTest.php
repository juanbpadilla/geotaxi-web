<?php

namespace Tests\Unit;

use App\Http\Controllers\MessagesController;
use App\Repositories\MessagesInterface;
use Mockery;
use PHPUnit\Framework\TestCase;

class MessagesControllerTest extends TestCase
{
    public function testIndex()
    {
        $controller = new MessagesController;
    }
}
