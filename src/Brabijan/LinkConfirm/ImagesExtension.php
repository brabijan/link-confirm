<?php

namespace Brabijan\LinkConfirm;

use Nette\Config\CompilerExtension;
use Nette\Config\Compiler;
use Nette\Config\Configurator;

/**
 * @author Jan Brabec <brabijan@gmail.com>
 */
class LinkConfirmExtension extends CompilerExtension
{

	public function loadConfiguration()
	{
		$builder = $this->getContainerBuilder();
		$engine = $builder->getDefinition('nette.latte');

		$install = 'Brabijan\LinkConfirm\Macro::install';
		$engine->addSetup($install . '(?->compiler)', array('@self'));
	}



	/**
	 * @param \Nette\Config\Configurator $config
	 * @param string $extensionName
	 */
	public static function register(Configurator $config, $extensionName = 'linkConfirmExtension')
	{
		$config->onCompile[] = function (Configurator $config, Compiler $compiler) use ($extensionName) {
			$compiler->addExtension($extensionName, new LinkConfirmExtension());
		};
	}

}