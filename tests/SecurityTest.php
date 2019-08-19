<?php 
namespace Tests;

use App\Helpers\Security;
use PHPUnit\Framework\TestCase;

class SecurityTest extends TestCase
{
    public function testFormatInput()
    {
        $sec = Security::formatInput('test');
        return $sec;
    }
}
