<?php
namespace Dobine\Attributes\Knp;

use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model\Translatable\TranslationTrait;

trait Translation {
	use TranslationTrait;
	
	/**
	 * @var string
	 * @ORM\Column(name="locale", type="string", length=5, nullable=false, options={"fixed"=true})
	 */
	protected $locale;
}
