<?php

namespace Caffeinated\Modules\Console\Generators;

use Symfony\Component\Console\Input\InputOption;
use Caffeinated\Modules\Console\GeneratorCommand;

class MakeControllerCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:module:controller
    	{slug : The slug of the module}
    	{name : The name of the controller class}
    	{--resource : Generate a module resource controller class}
    	{--location= : The modules location to create the module controller class in}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new module controller class';

    /**
     * String to store the command type.
     *
     * @var string
     */
    protected $type = 'Module controller';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        $stub_path = config('modules.stubs') ?: __DIR__ . '/stubs';
		if ($this->option('resource')) {
            return $stub_path . '/controller.resource.stub';
        }
        return $stub_path . '/controller.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param string $rootNamespace
     * @return string
     * @throws \Caffeinated\Modules\Exceptions\ModuleNotFoundException
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return module_class($this->argument('slug'), 'Http\\Controllers', $this->option('location'));
    }
}
