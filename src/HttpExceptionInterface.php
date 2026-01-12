<?php

declare(strict_types=1);

namespace Chubbyphp\HttpException;

interface HttpExceptionInterface extends \JsonSerializable, \Throwable
{
    public function getType(): string;

    public function getStatus(): int;

    public function getTitle(): string;

    /**
     * @return array{type: string, status: int, title: string, detail: null|string, instance: null|string, ...}
     */
    public function jsonSerialize(): array;
}
