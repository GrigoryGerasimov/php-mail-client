<?php
declare(strict_types=1);

namespace models\MailClient;

enum ClientTypes {
    case BUILT_IN;
    case THIRD_SIDE;
}