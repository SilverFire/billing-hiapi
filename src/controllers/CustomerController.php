<?php
/**
 * API for Billing
 *
 * @link      https://github.com/hiqdev/billing-hiapi
 * @package   billing-hiapi
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2017-2018, HiQDev (http://hiqdev.com/)
 */

namespace hiqdev\billing\hiapi\controllers;

use hiqdev\php\billing\customer\Customer;

class CustomerController extends \hiapi\controllers\BaseController
{
    protected $entityClass = Customer::class;

    public function commands()
    {
        return array_merge(parent::commands(), [
            'search' => [
                'class'  => \hiapi\commands\SearchCommand::class,
            ],
        ]);
    }
}
