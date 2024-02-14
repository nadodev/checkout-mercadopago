<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MercadoPago\MercadoPagoConfig;
use MercadoPago\Client\Payment\PaymentClient;


class PagamentoController extends Controller
{
    public function index()
    {
        return view('pagar.index');
    }

    public function process_payment(Request $request)
    {
        MercadoPagoConfig::setAccessToken("APP_USR-4758849094737649-020509-83d64caf868d8ec71483a89f08397b23-177683062");

        try {
            $contents = json_decode($request->getContent(), true);

            $client = new PaymentClient();
   
            $paymentRequest = [
                "transaction_amount" => $contents['transactionAmount'],
                "token" => $contents['token'],
                "description" => $contents['description'],
                "installments" => $contents['installments'],
                "payment_method_id" => $contents['paymentMethodId'],
                "issuer_id" => $contents['issuerId'],
                "payer" => [
                    "email" => $contents['payer']['email'],
                    "identification" => [
                        "type" => $contents['payer']['identification']['type'],
                        "number" => $contents['payer']['identification']['number'],
                    ]
                ]
            ];
            
            $payment = $client->create($paymentRequest);

            $this->validatePaymentResult($payment);

            $response_fields = [
                'id' => $payment->id,
                'status' => $payment->status,
                'detail' => $payment->status_detail
            ];

            return response()->json($response_fields, 201);
        } catch (\Exception $exception) {
            $response_fields = ['error_message' => $exception->getMessage()];
            return response()->json($response_fields, 400);
        }
    }


    private function validatePaymentResult($payment)
    {

        if ($payment->id === null) {
            $errorMessage = 'Unknown error cause';

            if ($payment->error !== null) {
                $sdkErrorMessage = $payment->error->message;
                $errorMessage = $sdkErrorMessage !== null ? $sdkErrorMessage : $errorMessage;
            }

            throw new \Exception($errorMessage);
        }
    }


}
