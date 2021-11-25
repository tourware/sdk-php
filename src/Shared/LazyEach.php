<?php


declare(strict_types=1);

namespace Tourware\Shared;

use Adbar\Dot;
use Closure;
use Iterator;
use Psr\Http\Message\RequestInterface;

trait LazyEach
{
    /**
     * 300 is the Tourware API limit
     */
    protected int $chunk = 300;

    abstract protected function paginatedRequest(int $offset, int $limit): RequestInterface;

    abstract protected function sendRequest(RequestInterface $request): Dot;

    protected function listAll(int $offset, int $limit): Iterator
    {
        $page = 1;

        $req = $this->paginatedRequest(
            $offset,
            $limit > $this->chunk ? $this->chunk : $limit
        );

        $res = $this->sendRequest($req);

        $total = (int) $res['total'];

        foreach ($res->get('records', []) as $record) {
            yield $record;
        }

        while (($this->chunk * $page < $total) && ($this->chunk * $page) < $limit) {

            $page++;

            yield from $this->listPage(
                $page,
                $offset + (($page - 1) * $this->chunk),
                $limit
            );
        }
    }

    protected function listPage(int $page, int $offset, int $limit): Iterator
    {
        $req = $this->paginatedRequest($offset, $this->chunk);
        $res = $this->sendRequest($req);

        $total = ($page - 1) * $this->chunk;

        foreach ($res->get('records', []) as $record) {

            if ($total < $limit) {
                yield $record;
            }

            $total++;
        }
    }
}
