<?php

declare(strict_types=1);

namespace Telegram\method;

interface Method {

    public function getName() : string;

    public function toArray() : array;

}