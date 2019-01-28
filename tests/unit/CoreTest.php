<?php

namespace Tests\Unit;

require(__DIR__.'/../../core/autoload.function.php');

use PHPUnit\Framework\TestCase;
use Core\Classes\URL;

class CoreTest extends TestCase
{
    public function testUrl(){
        $url = new URL('users/12');
        $this->assertSame('users/12', $url->getUrl('string'));
    }
}
