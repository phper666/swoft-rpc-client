<?php
/**
 * This file is part of Swoft.
 *
 * @link https://swoft.org
 * @document https://doc.swoft.org
 * @contact group@swoft.org
 * @license https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

namespace App\Controllers;

use App\Lib\UserInterface;
use App\Lib\OrderInterface;
use Swoft\Bean\Annotation\Inject;
use Swoft\Http\Server\Bean\Annotation\Controller;
use Swoft\Http\Server\Bean\Annotation\RequestMapping;
use Swoft\Rpc\Client\Bean\Annotation\Reference;

/**
 * rpc controller test
 *
 * @Controller(prefix="rpc")
 */
class RpcController
{
    /**
     * @Reference(name="user", fallback="userFallback")
     *
     * @var UserInterface
     */
    private $userService;

    /**
     * @Reference(name="order", fallback="orderFallback")
     *
     * @var OrderInterface
     */
    private $orderService;

    /**
     * @Reference(name="user", version="1.0.1")
     *
     * @var UserInterface
     */
    private $userServiceV2;

    /**
     * @RequestMapping(route="call")
     * @return array
     */
    public function call()
    {
        $user  = $this->userService->getUsers(['test']);
        $user1  = $this->userServiceV2->getUsers(['test']);
        $order = $this->orderService->getOrder();

        return [
            'userv1'  => $user,
            'userv2'  => $user1,
            'orderv1' => $order,
        ];
    }
}