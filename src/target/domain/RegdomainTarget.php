<?php
/**
 * API for Billing
 *
 * @link      https://github.com/hiqdev/billing-hiapi
 * @package   billing-hiapi
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2017-2020, HiQDev (http://hiqdev.com/)
 */

namespace hiqdev\billing\hiapi\target\domain;

use hiqdev\php\billing\target\Target;

/**
 * Class RegdomainTarget for RCP.
 *
 * @author Andrii Vasyliev <sol@hiqdev.com>
 */
class RegdomainTarget extends Target
{
    public function __construct($id, $type, $name = null)
    {
        parent::__construct($id, 'domain', $name);
    }
}