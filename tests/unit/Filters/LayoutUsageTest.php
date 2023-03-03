<?php

namespace Tests\unit\Filters;

use App\Filters\LayoutUsage;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use PHPUnit\Framework\TestCase;
use Prophecy\PhpUnit\ProphecyTrait;

/**
 * @internal
 */
final class LayoutUsageTest extends TestCase
{
    use ProphecyTrait;

    private LayoutUsage $layoutUsage;

    protected function setUp(): void
    {
        $this->layoutUsage = new LayoutUsage();
    }

    public function testBeforeOnIsAPI()
    {
        $request = $this->prophesize(IncomingRequest::class);
        $request->hasHeader('Accept')->willReturn(true);
        $request->header('Accept')->willReturn(new class () {
            public function getValue()
            {
                return 'application/json';
            }
        });
        $request->isAJAX()->willReturn(false);

        $this->assertNull($this->layoutUsage->before($request->reveal()));
    }

    public function testBeforeOnIsAjax()
    {
        $request = $this->prophesize(IncomingRequest::class);
        $request->hasHeader('Accept')->willReturn(true);
        $request->header('Accept')->willReturn(new class () {
            public function getValue()
            {
                return 'text/html';
            }
        });
        $request->isAJAX()->willReturn(true);

        $this->assertNull($this->layoutUsage->before($request->reveal()));
    }

    public function testAfter()
    {
        $layoutUsage = new LayoutUsage();

        $this->assertNull(
            $layoutUsage->after(
                $this->prophesize(RequestInterface::class)->reveal(),
                $this->prophesize(ResponseInterface::class)->reveal()
            )
        );
    }
}
