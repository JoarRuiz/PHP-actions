<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;
include('core/php/Session.php');

use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(Session::class)]
class SessionTest extends TestCase {
    protected $session;

    protected function setUp(): void {
        $this->session = new Session();
    }

    public function testSetAndGet(): void {
        $this->session->set('name', 'John');
        $this->assertEquals('John', $this->session->get('name'));
    }

    public function testGetNonExistent(): void {
        $this->assertFalse($this->session->get('non_existent'));
    }

    public function testDeleteVar(): void {
        $this->session->set('name', 'John');
        $this->session->delete_var('name');
        $this->assertFalse($this->session->get('name'));
    }

    public function testSessionFinish(): void {
        $this->session->set('name', 'John');
        $this->session->session_finish();
        $this->assertFalse($this->session->get('name'));
    }
}
