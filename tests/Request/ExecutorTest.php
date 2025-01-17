<?php

declare(strict_types=1);

namespace Overblog\GraphQLBundle\Tests\Request;

use GraphQL\Executor\Promise\Adapter\ReactPromiseAdapter;
use Overblog\GraphQLBundle\Executor\Executor;
use Overblog\GraphQLBundle\Request\Executor as RequestExecutor;
use PHPUnit\Framework\TestCase;
use Symfony\Component\EventDispatcher\EventDispatcher;

class ExecutorTest extends TestCase
{
    /**
     * @expectedException \RuntimeException
     * @expectedExceptionMessage At least one schema should be declare.
     */
    public function testGetSchemaNoSchemaFound(): void
    {
        $dispatcher = $this->getMockBuilder(EventDispatcher::class)->setMethods(['dispatch'])->getMock();

        (new RequestExecutor(new Executor(), new ReactPromiseAdapter(), $dispatcher))->getSchema('fake');
    }
}
