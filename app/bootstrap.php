<?php
/**
 * Generic bootstrap
 */

// Let's screw the composer loader
require LIBS_DIR . '/autoload.php';

// Configure application
$configurator = new \Nette\Config\Configurator;

// Enable Nette Debugger for error visualisation & logging
//$configurator->setDebugMode($configurator::AUTO);
$configurator->enableDebugger(__DIR__ . '/../log');

// Enable RobotLoader - this will load all classes automatically
$configurator->setTempDirectory(__DIR__ . '/../temp');
$configurator->createRobotLoader()
	->addDirectory(APP_DIR)
	->addDirectory(LIBS_DIR . '/nette/nette/Nette')
	->register();

// Create Dependency Injection container from config.neon file
$configurator->addConfig(__DIR__ . '/config/config.neon');

// Append config based on the machine
if (false) {
    $configurator->addConfig(__DIR__ . '/config/live.neon', \Nette\Config\Configurator::PRODUCTION);

} elseif (false) {
    $configurator->addConfig(__DIR__ . '/config/stage.neon', \Nette\Config\Configurator::PRODUCTION);

} elseif (isset($_SERVER['SERVER_ADMIN']) && $_SERVER['SERVER_ADMIN'] === 'apache@ptacek-dell.RD') {
    $configurator->addConfig(__DIR__ . '/config/foglcz.neon', \Nette\Config\Configurator::DEVELOPMENT);
}

$container = $configurator->createContainer();

// Setup router
//$container->router[] = new \Nette\Application\Routers\Route('index.php', 'Homepage:default', Route::ONE_WAY);
$container->router[] = new \Nette\Application\Routers\Route('<presenter>/<action>[/<id>]', 'Homepage:default');

// Configure and run the application!
$container->application->run();
