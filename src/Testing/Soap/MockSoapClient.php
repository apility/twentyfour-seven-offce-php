<?php

namespace Apility\Office247\Testing\Soap;

use Apility\Office247\Contracts\SoapClientContract;
use Apility\Office247\Exceptions\TestException;
use Throwable;

abstract class MockSoapClient implements SoapClientContract
{
    protected $queue = [];

    public function __construct(array $queue = [])
    {
        $this->queue = $queue;
    }

    public function reset()
    {
        $this->queue = [];
    }

    public function queue($method, $response)
    {
        $this->queue[$method] = $this->queue[$method] ?? [];
        $this->queue[$method][] = $response;
    }

    protected function pop($method)
    {
        $queue = $this->queue[$method] ?? [];

        if (count($queue) === 0) {
            throw new TestException('Queue [' . $method . '] is empty');
        }

        return array_shift($queue);
    }

    public function __call($method, $arguments = [])
    {
        $result = $this->pop($method);

        if ($result instanceof Throwable) {
            throw $result;
        }
    }

    public function __setCookie($name, $value)
    {
    }
}
