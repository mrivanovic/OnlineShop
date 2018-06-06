<?php

// pk_test_oXpp2smuiw4u2cv0zoh2Sm7X

require_once APPPATH."libraries/stripe-php-6.7.4/init.php";

use \Stripe\Stripe as StripeLibrary;
use \Stripe\Customer as StripeCustomer;
use \Stripe\Charge as StripeCharge;

class Stripe extends CI_Controller
{
    public function __construct()
    {
        parent:: __construct();
        $this->load->library('session');
    }

    public function order()
    {
        $email = $_SESSION['mail'];;

        $token = $this->input->post('token');
        $amount = $this->input->post('amount');
        $currency = $this->input->post('currency');
        
        $stripe = [
            'secret_key'        => 'sk_test_Gp9g0MV987bAtpiOIoCVXrBX',
            'publishable_key'   => 'pk_test_oXpp2smuiw4u2cv0zoh2Sm7X'
        ];

        StripeLibrary::setApiKey($stripe['secret_key']);

        $customer = StripeCustomer::create([
            'email' => $email,
            'source' => $token
        ]);
        
        $charge = StripeCharge::create([
            'customer' => $customer->id,
            'amount' => $amount,
            'currency' => $currency
        ]);
        //TODO

        // | AI | $email     | $product   | $charge->id | default: 0 | $amount | $currency |
        // | id | buyer_mail | product_id | stripe_id   | delivered  | price   | currency  |

        echo "You have successfully bought this item!";
    }
}