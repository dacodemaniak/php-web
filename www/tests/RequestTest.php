<?php
declare(strict_types=1);

use Aelion\Http\Request\Request;
use \PHPUnit\Framework\TestCase;

final class RequestTest extends TestCase {
    private array $originalServer = [];

    protected function setUp(): void {
        $this->originalServer = $_SERVER;
    }

    protected function tearDown(): void {
        $_SERVER = $this->originalServer;
    }

    public function testHasAnInstance(): void {
        $request = new Request();
        $this->assertInstanceOf(Request::class, $request, '$request is a Request instance');
    }

<<<<<<< HEAD
    public function testHasUriContent(): void {
=======
    public function testAsUriContent(): void {
>>>>>>> 18dbfee (Request processing and tests)
        /**
         * @server REQUEST_URI='/'
         */
        $_SERVER['REQUEST_URI'] = '/';
<<<<<<< HEAD

        $request = new Request();
        $this->assertEquals('/', $request->uri, 'Hydate URI content');
=======
        
        $request = new Request();
        $this->assertEquals('/', $request->request_uri, 'Hydate URI content');
>>>>>>> 18dbfee (Request processing and tests)
    }

    public function testCanAddAProperty(): void {
        $request = new Request();
        $request->uri = '/';
        $this->assertEquals('/', $request->uri, 'Test URI was /');
    }
}