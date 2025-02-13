<?php

namespace Tighten\Linters;

use PhpParser\Node;
use PhpParser\Node\Stmt\Class_;
use PhpParser\NodeTraverser;
use PhpParser\NodeVisitor\FindingVisitor;
use PhpParser\Parser;
use Tighten\BaseLinter;

class NoMethodVisibilityInTests extends BaseLinter
{
    protected $description = 'There should be no method visibility in test methods.';

    public function lint(Parser $parser)
    {
        $traverser = new NodeTraverser;

        $visitor = new FindingVisitor(function (Node $node) {
            return $node instanceof Node\Stmt\ClassMethod
                && ! in_array($node->name->toString(), ['setUp', 'setUpBeforeClass', 'tearDown', 'tearDownAfterClass'])
                && (bool) ($node->flags & Class_::VISIBILITY_MODIFIER_MASK);
        });

        $traverser->addVisitor($visitor);

        $traverser->traverse($parser->parse($this->code));

        return $visitor->getFoundNodes();
    }
}
