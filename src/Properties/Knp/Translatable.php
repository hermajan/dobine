<?php
namespace Dobine\Properties\Knp;

use Knp\DoctrineBehaviors\Contract\Entity\TranslationInterface;
use Knp\DoctrineBehaviors\Model\Translatable\TranslatableTrait;

trait Translatable {
	use TranslatableTrait;
	
	public function getTranslation(?string $locale = null): ?TranslationInterface {
		if($locale === null) {
			$locale = $this->getCurrentLocale();
		}
		return $this->findTranslationByLocale($locale, true);
	}
}
