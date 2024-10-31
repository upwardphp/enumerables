<?php

namespace Upward\Tests;

use Upward\Enumerables\Attributes\Label;
use Upward\Enumerables\Traits\HasLabel;

enum LabelEnum
{
    use HasLabel;

    #[Label]
    case First;

    #[Label(text: 'Another text')]
    case Second;

    case Third;

    #[Label(translate: false)]
    case Fourth;
}
