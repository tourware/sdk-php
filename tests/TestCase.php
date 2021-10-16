<?php

declare(strict_types=1);

namespace Tourware\Tests;

use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Stream;
use GuzzleHttp\Psr7\Utils;
use PHPUnit\Framework\MockObject\MockObject;
use Sigmie\Http\JSONResponse as HttpJSONResponse;
use Tourware\Client;
use Tourware\Clients\ReadClient;
use Tourware\Clients\WriteClient;
use Tourware\QueryBuilder;
use GuzzleHttp\Client as Http;
use Psr\Http\Message\ResponseInterface;

class TestCase extends \PHPUnit\Framework\TestCase
{
    /**
     * @var Http|MockObject
     */
    protected $httpMock;

    protected Client $client;

    protected Stream $fakeStream;

    /**
     * @var ResponseInterface|MockObject
     */
    protected $responseMock;

    public function setUp(): void
    {
        parent::setUp();

        $this->httpMock = $this->createMock(Http::class);

        $this->httpMock
            ->method('sendRequest')
            ->willReturn(new Response(200, [], json_encode(['total' => 0])));

        $this->client = new Client($this->httpMock);

        $this->fakeStream = Utils::streamFor();

        QueryBuilder::fakeStream($this->fakeStream);
        WriteClient::fakeStream($this->fakeStream);
        ReadClient::fakeStream($this->fakeStream);
    }
}
