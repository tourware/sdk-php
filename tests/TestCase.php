<?php

declare(strict_types=1);

namespace Tourware\Tests;

use GuzzleHttp\Psr7\Stream;
use GuzzleHttp\Psr7\Utils;
use PHPUnit\Framework\MockObject\MockObject;
use Sigmie\Http\Contracts\JSONClient;
use Tourware\Client;
use Tourware\QueryBuilder;

class TestCase extends \PHPUnit\Framework\TestCase
{
    protected JSONClient|MockObject $httpMock;

    protected Client $client;

    protected Stream $fakeStream;

    public function setUp(): void
    {
        parent::setUp();

        $this->httpMock = $this->createMock(JSONClient::class);

        $this->client = new Client($this->httpMock);

        $this->fakeStream = Utils::streamFor();

        QueryBuilder::fakeStream($this->fakeStream);
    }
}
