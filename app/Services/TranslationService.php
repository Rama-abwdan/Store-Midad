<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Stichoza\GoogleTranslate\GoogleTranslate;

/**
 * خدمة الترجمة الآلية عبر Google Translate (مكتبة Stichoza).
 *
 * لا تحتاج API Key - تستخدم الترجمة المجانية المقدمة.
 * يتم تخزين النتائج في Cache لمدة 30 يوماً لتسريع الترجمات المكررة.
 *
 * @example
 * // $service = app(TranslationService::class);
 * // $service->translate('ملابس', 'en');  // => "Clothes"
 * // $service->translate('ملابس', 'tr');  // => "Giysim"
 */
class TranslationService
{
    protected GoogleTranslate $translator;

    /**
     * عند إنشاء الخدمة نقوم بتهيئة Google Translate.
     */
    public function __construct()
    {
        $this->translator = new GoogleTranslate;
    }

    /**
     * ترجمة نص من لغة مصدر إلى لغة هدف.
     *
     * @param string $text     النص المراد ترجمته (عادةً عربي)
     * @param string $targetLang اللغة المطلوبة (en, tr)
     * @param string $sourceLang اللغة الأصلية (افتراضياً: ar)
     *
     * @example
     * // translate('الإلكترونيات', 'en', 'ar') => "Electronics"
     * // translate('الإلكترونيات', 'ar', 'ar') => (نفس اللغة) "الإلكترونيات"
     * // translate('', 'en')                   => (نص فارغ) ""
     */
    public function translate(string $text, string $targetLang, string $sourceLang = 'ar'): ?string
    {
        $text = trim($text);

        // إذا كان النص فارغاً أو اللغة المصدر نفس اللغة الهدف، لا داعي للترجمة
        if ($text === '' || $sourceLang === $targetLang) {
            return $text;
        }

        $this->translator->setOptions(['verify' => false]);//***********انا ض Rama Abodan */

        // إنشاء مفتاح فريد للتخزين المؤقت (Cache) بناءً على النص واللغات
        $cacheKey = 'trans:' . md5($text . $sourceLang . $targetLang);

        // تخزين النتيجة في الكاش لمدة 30 يومًا، أو إرجاعها إذا كانت موجودة مسبقاً
        return Cache::remember($cacheKey, now()->addDays(30), function () use ($text, $targetLang, $sourceLang) {
            $this->translator->setSource($sourceLang);
            $this->translator->setTarget($targetLang);

            return $this->translator->translate($text);
        });
    }
}