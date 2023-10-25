<?php

namespace Integrador\Sefaz\Entities\Traits;

trait MethodsMagicsTrait
{
    public function __get(string $property)
    {
        if ($this->{$property}) {
            return $this->{$property};
        }

        $className = get_class($this);
        throw new \Exception("A propriedade {$property} não existe na class {$className}");
    }
}