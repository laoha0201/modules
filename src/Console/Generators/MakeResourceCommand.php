<?php

namespace Caffeinated\Modules\Console\Generators;

use Caffeinated\Modules\Console\GeneratorCommand;

class MakeResourceCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:module:resource
    	{slug : The slug of the module.}
    	{name : The name of the form resource class.}
    	{--location= : The modules location to create the module form resource class in}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new module form resource class';

    /**
     * String to store the command type.
     *
     * @var string
     */
    protected $type = 'Module resource';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        $stub_path = config('modules.stubs') ?: __DIR__ . '/stubs';
		return $stub_path .'/stubs/resource.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param string $rootNamespace
     *
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return module_class($this->argument('slug'), 'Http\\Resources', $this->option('location'));
    }
}
