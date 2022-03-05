<?php

namespace App\Http\Controllers;

use App\Models\Order;

class ApiController {
    public function getMarcosFineArts() {
        $marcos_fine_arts = Order::with(['order_line_items' => function($q) {
                                $q->where('vendor_id', '=', 1);
                            }])
                            ->get()->toArray();
        $result = $this->jsonFormat($marcos_fine_arts);

        return response()->json(['data' => ['orders' => $result]]);
    }

    public function getDreamJunctions() {
        $marcos_fine_arts = Order::with(['order_line_items' => function($q) {
                                $q->where('vendor_id', '=', 2);
                            }])
                            ->get()->toArray();
        $result = $this->xmlFormat($marcos_fine_arts);
        return response()->xml($result, $status = 200, ['Content-Type: application/xml', 'Access-Control-Allow-Origin: *'], $xmlRoot = 'orders', $encoding = null);
    }

    protected function jsonFormat($orders)
    {
        $sortOrder = array();
        foreach ($orders as $order) {
            $lineItems = $order['order_line_items'];
            $sorLineItems = array();
            foreach ($lineItems as $lineItem) {
                $sorLineItems[] = [
                        'external_order_line_item_id' => $lineItem['id'],
                        'product_id' => $lineItem['product_id'],
                        'quantity' => $lineItem['quantity'],
                        'image_url' => $lineItem['product']['creative']["image_url"],
                ];
            }

            $sortOrder[] = [
                        'external_order_id' => $order['id'],
                        'buyer_first_name' => $order['first_name'],
                        'buyer_last_name' => $order['last_name'],
                        'buyer_shipping_address_1' => $order['address_1'],
                        'buyer_shipping_address_2' => $order['address_2'],
                        'buyer_shipping_city' => $order['city'],
                        'buyer_shipping_state' => $order['state'],
                        'buyer_shipping_postal' => $order['postal_code'],
                        'buyer_shipping_country' => $order['country'],
                        'print_line_items' => $sorLineItems
                ];
        }
        return $sortOrder;
    }

    protected function xmlFormat($orders)
    {
        $sortOrder = array();
        foreach ($orders as $order) {
            $lineItems = $order['order_line_items'];
            $sorLineItems = array();
            foreach ($lineItems as $lineItem) {
                $sorLineItems[] = [
                        'order_line_item_id' => $lineItem['id'],
                        'product_id' => $lineItem['product_id'],
                        'quantity' => $lineItem['quantity'],
                        'image_url' => $lineItem['product']['creative']["image_url"],
                ];
            }
            $sortOrder["order"] = [
                        'order_number' => $order['id'],
                        'customer_data' => [
                                'external_order_line_item_id' => $order['id'],
                                'first_name' => $order['first_name'],
                                'last_name' => $order['last_name'],
                                'address1' => $order['address_1'],
                                'address2' => $order['address_2'],
                                'city' => $order['city'],
                                'state' => $order['state'],
                                'zip' => $order['postal_code'],
                                'country' => $order['country']
                        ],
                        'items' => ['item' => $sorLineItems],
                ];
        }
        return $sortOrder;
    }
}
