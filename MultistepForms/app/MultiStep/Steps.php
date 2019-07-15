<?php

namespace App\MultiStep;

use Illuminate\Http\Request;
use App\MultiStep\Store\Contracts\StepStorage;

class Steps
{
    protected $name;

    protected $step;

    public function __construct(StepStorage $storage)
    {
        $this->storage = $storage;
    }

    public function step($name, $step)
    {
        $this->name = $name;
        $this->step = $step;

        return $this;
    }

    public function store($data)
    {
        $this->storage->put($this->key() . ".{$this->step}.data", $data);

        return $this;
    }

    public function complete()
    {
        $this->storage->put($this->key() . ".{$this->step}.complete", true);

        return $this;
    }

    public function __get($property)
    {
        return $this->storage->get("multistep.{$this->name}.{$this->step}.data.{$property}");
    }

    protected function key()
    {
        return "multistep.{$this->name}";
    }
}
