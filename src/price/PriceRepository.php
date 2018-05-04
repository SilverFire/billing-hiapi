<?php
/**
 * API for Billing
 *
 * @link      https://github.com/hiqdev/billing-hiapi
 * @package   billing-hiapi
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2017, HiQDev (http://hiqdev.com/)
 */

namespace hiqdev\billing\hiapi\price;

use hiqdev\php\billing\price\PriceFactoryInterface;

class PriceRepository extends \hiqdev\yii\DataMapper\repositories\BaseRepository
{
    public $queryClass = PriceQuery::class;
}