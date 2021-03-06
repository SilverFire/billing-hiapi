<?php
/**
 * API for Billing
 *
 * @link      https://github.com/hiqdev/billing-hiapi
 * @package   billing-hiapi
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2017-2018, HiQDev (http://hiqdev.com/)
 */

namespace hiqdev\billing\hiapi\customer;

use League\Tactician\Middleware;
use hiqdev\php\billing\customer\Customer;
use hiqdev\billing\hiapi\customer\CustomerRepository;
use yii\web\User;

class CustomerLoader implements Middleware
{
    private $repo;

    private $user;

    public function __construct(User $user, CustomerRepository $repo)
    {
        $this->user = $user;
        $this->repo = $repo;
    }

    public function execute($command, callable $next)
    {
        if (empty($command->customer)) {
            $command->customer = $this->findCustomer($command);
        }

        return $next($command);
    }

    private function findCustomer($command): Customer
    {
        if (empty($command->customer_id)) {
            return $this->getCurrentCustomer();
        }

        $res = $this->repo->findById($command->customer_id);
        if (empty($res)) {
            return $this->getCurrentCustomer();
        }

        return $res;
    }

    private function getCurrentCustomer(): Customer
    {
        return new Customer($this->user->id, $this->user->getIdentity()->username);
    }
}
