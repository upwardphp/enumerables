<?php

namespace Upward\Tests;

use Upward\Enumerables\Attributes\Label;
use Upward\Enumerables\Traits\InteractsWithLabel;

enum LabelEnum
{
    use InteractsWithLabel;

    #[Label]
    case First;

    #[Label(text: 'Another text')]
    case Second;

    case Third;

    #[Label(translate: false)]
    case Fourth;
}
