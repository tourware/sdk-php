<?php

declare(strict_types=1);

namespace Tourware\Tests;

use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Stream;
use GuzzleHttp\Psr7\Utils;
use PHPUnit\Framework\MockObject\MockObject;
use Sigmie\Http\Contracts\JSONClient;
use Sigmie\Http\Contracts\JSONResponse;
use Sigmie\Http\JSONResponse as HttpJSONResponse;
use Tourware\Client;
use Tourware\Clients\ReadClient;
use Tourware\Clients\WriteClient;
use Tourware\QueryBuilder;

class TestCase extends \PHPUnit\Framework\TestCase
{
    protected JSONClient|MockObject $httpMock;

    protected Client $client;

    protected Stream $fakeStream;

    protected JSONResponse|MockObject $responseMock;

    public function setUp(): void
    {
        parent::setUp();

        $this->httpMock = $this->createMock(JSONClient::class);

        $this->httpMock->method('request')->willReturn(
            new HttpJSONResponse(
                new Response(body: '[]')
            )
        );

        $this->client = new Client($this->httpMock);

        $this->fakeStream = Utils::streamFor();

        QueryBuilder::fakeStream($this->fakeStream);
        WriteClient::fakeStream($this->fakeStream);
        ReadClient::fakeStream($this->fakeStream);
    }
}
