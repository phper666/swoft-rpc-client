<?php
/**
 * This file is part of Swoft.
 *
 * @link https://swoft.org
 * @document https://doc.swoft.org
 * @contact group@swoft.org
 * @license https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

namespace App\Fallback;

use App\Lib\OrderInterface;
use Swoft\Sg\Bean\Annotation\Fallback;
use Swoft\Core\ResultInterface;

/**
 * Fallback order
 *
 * @Fallback("orderFallback")
 * @method ResultInterface deferGetOrder()
 */
class OrderServiceFallback implements OrderInterface
{
    public function getOrder()
    {
        return ['order服务调用失败，降级处理'];
    }
}