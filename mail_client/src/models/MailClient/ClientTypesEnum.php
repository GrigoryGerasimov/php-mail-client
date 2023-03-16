<?php

declare(strict_types=1);

namespace mcl\models\MailClient;

enum ClientTypesEnum
{
    case BUILT_IN;
    case THIRD_SIDE;
}