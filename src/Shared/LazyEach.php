<?php


declare(strict_types=1);

namespace Sigmie\Base\Shared;

use Adbar\Dot;
use Closure;
use Iterator;
use Psr\Http\Message\RequestInterface;
use Sigmie\Base\Actions\Document as DocumentActions;
use Sigmie\Base\APIs\Count;
use Sigmie\Base\Documents\Document;

trait LazyEach
{
    protected int $chunk = 300;

    abstract protected function listRequest(int $offset, int $limit): RequestInterface;

    abstract protected function sendRequest(RequestInterface $request): Dot;

    protected function listAll(int $offset, int $limit): Iterator
    {
        $page = 1;

        $req = $this->listRequest($offset, $limit);
        $res = $this->sendRequest($req);

        $total = (int) $res['total'];

        foreach ($res['records'] as $record) {
            yield $record;
        }

        while ($this->chunk * $page < $total) {

            $page++;

            yield from $this->listPage($page, $offset, $limit);
        }
    }

    protected function listPage(int $page, int $offset, int $limit): Iterator
    {
        $req = $this->listRequest($offset, $limit);
        $res = $this->sendRequest($req);

        $body = [
            'from' => ($page - 1) * $this->chunk,
            'size' => $this->chunk,
            'query' => ['match_all' => (object) []]
        ];

        foreach ($res['records'] as $record) {
            yield $record;
        }
    }
}
