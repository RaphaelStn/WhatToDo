<?php

namespace Squirrel\TwigPhpSyntax\Test;

use Twig\Compiler;
use Twig\Node\Expression\TestExpression;

/**
 * Checks that a variable is a scalar (int, float, string or bool).
 *
 *  {{ var is scalar }}
 */
class ScalarTest extends TestExpression
{
    public function compile(Compiler $compiler): void
    {
        $compiler
            ->raw('(true === \\is_scalar(')
            ->subcompile($this->getNode('node'))
            ->raw('))')
        ;
    }
}
