<?php

namespace Brabijan\LinkConfirm;

use Nette\Latte\Macros\MacroSet,
	Nette\Latte\PhpWriter,
	Nette\Latte\MacroNode,
	Nette\Latte\Compiler;

/**
 * @author Jan Brabec <brabijan@gmail.com>
 */
class Macro extends MacroSet
{


	/**
	 * @param \Nette\Latte\Compiler $compiler
	 *
	 * @return \Nette\Latte\Macros\MacroSet
	 */
	public static function install(Compiler $compiler)
	{
		$me = new static($compiler);

		/**
		 * {linkConfirm $message}
		 */
		$me->addMacro('confirm', NULL, NULL, array($me, 'macroAttrLinkConfirm'));

		return $me;
	}



	/**
	 * @param MacroNode $node
	 * @param PhpWriter $writer
	 * @return string
	 */
	public function macroAttrLinkConfirm(MacroNode $node, PhpWriter $writer)
	{
		return $writer->write('?> onclick="return confirm(\'<?php echo %escape("'.$node->args.'")?>\');" <?php');
	}

}