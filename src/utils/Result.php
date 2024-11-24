<?php

namespace mepoooe\cargoPuzzleMaster\utils;

use InvalidArgumentException;

class Result
{
    const CODE_SUCCESS = 0;


    public function __construct(protected int $code = self::CODE_SUCCESS, protected array $data = [])
    {}

    public function getCode(): int
    {
        return $this->code;
    }

    public function setCode(int $code): self
    {
        $this->code = $code;
        return $this;
    }

    public function getData(): array
    {
        return $this->data;
    }

    public function setData(array $data): self
    {
        $this->data = $data;
        return $this;
    }

    public function isOK(): bool
    {
        return $this->code == self::CODE_SUCCESS;
    }
    
    public static function ok(array $data = []): Result
    {
        return new Result(self::CODE_SUCCESS, $data);
    }

    public static function error(int $code, array $data = []): Result
    {
        if ($code == Result::CODE_SUCCESS) {
            throw new InvalidArgumentException('Code can not be 0. Cause 0 means success.');
        }
        return new Result($code, $data);
    }
}
