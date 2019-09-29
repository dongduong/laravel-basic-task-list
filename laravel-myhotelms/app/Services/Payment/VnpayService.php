<?php

namespace App\Services\Payment;

use Illuminate\Http\Request;
use Session;
use URL;
use App\Enums\PAYMENT_METHOD;

class VnpayService
{
    public $_vnpay_conf;

    public function __construct()
    {
        $this->_vnpay_conf = \Config::get('vnpay');
    }

    public function pay(Request $request)
    {
        

        session(['cost_id' => $request->id]);
        session(['url_prev' => url()->previous()]);
        $vnp_TmnCode = $this->_vnpay_conf['code']; //Mã website tại VNPAY 
        $vnp_HashSecret = $this->_vnpay_conf['secret']; //Chuỗi bí mật
        $vnp_Url = $this->_vnpay_conf['url'];
        $vnp_Returnurl = URL::route('payment.vnpay.status');
        $vnp_TxnRef = date("YmdHis"); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = "Thanh toán hóa đơn phí dich vụ";
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $request->get('amount') * 100000;
        $vnp_Locale = 'vn';
        $vnp_IpAddr = request()->ip();

        $inputData = array(
            "vnp_Version" => "2.0.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . $key . "=" . $value;
            } else {
                $hashdata .= $key . "=" . $value;
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }
        //https://sandbox.vnpayment.vn/paymentv2/Transaction/PaymentMethod.html?token=889a0a06b9c441d3a6dd8b149dc5b465

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
           // $vnpSecureHash = md5($vnp_HashSecret . $hashdata);
            $vnpSecureHash = hash('sha256', $vnp_HashSecret . $hashdata);
            $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;

            $paymentService = new PaymentService();
            $paymentService->updateProcess(
                $vnp_TxnRef,
                $request->get('amount'),
                PAYMENT_METHOD::VNPay, 
                $request->get('reservation_id')
            );
            return $vnp_Url;
        }

        \Session::put('error', 'Unknown error occurred');
        return null;
    }

    public function getPaymentStatus(Request $request)
    {
        //http://localhost:8300/vnpay_status?vnp_Amount=2000000&vnp_BankCode=NCB&vnp_BankTranNo=20190928155739&vnp_CardType=ATM&vnp_OrderInfo=Thanh+to%C3%A1n+h%C3%B3a+%C4%91%C6%A1n+ph%C3%AD+dich+v%E1%BB%A5&vnp_PayDate=20190928155721&vnp_ResponseCode=00&vnp_TmnCode=LZALSLLY&vnp_TransactionNo=13179416&vnp_TxnRef=20190928085606&vnp_SecureHashType=SHA256&vnp_SecureHash=1758032836daee6b568295decc962f8d7e4c27b63d3e5ee47a46f427920b23a4

        
        if ($request->vnp_TmnCode != $this->_vnpay_conf['code']) {
            if (\Config::get('app.debug')) {
                \Session::put('error', 'VNPAY CODE incorrect when return status');           
            } else {
                \Session::put('error', 'Some error occur, sorry for inconvenient');
            }

            return false;
        }

        $url = session('url_prev','/');
        if($request->vnp_ResponseCode == "00") {
            $payment_id = $request->vnp_TxnRef;
            $token = $request->vnp_SecureHash;
            $description = "Response CODE : " . $request->vnp_ResponseCode . " .Transaction No : " . $request->vnp_TransactionNo . " .Payer Info : " . $request->vnp_OrderInfo . " .Bank CODE: " . $request->vnp_BankCode . " .Pay date: " . $request->vnp_PayDate;
            $paymentService = new PaymentService();
            $paymentService->updateStatusSuccess(
                    $payment_id,
                    $token,
                    $description
                );

            return true;
        }

        session()->forget('url_prev');
        if (\Config::get('app.debug')) {
            \Session::put('error', 'Payment failed - responsed code from VNPAY: '. $request->vnp_ResponseCode); 

        } else {
            \Session::put('error', 'Some error occur, sorry for inconvenient');
        }
        return false;
    }
}