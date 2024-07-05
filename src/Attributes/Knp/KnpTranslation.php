<?php
namespace Dobine\Attributes\Knp;

use Dobine\Attributes\Locale;
use Knp\DoctrineBehaviors\Model\Translatable\TranslationTrait;

trait KnpTranslation {
	use Locale, TranslationTrait;
}
