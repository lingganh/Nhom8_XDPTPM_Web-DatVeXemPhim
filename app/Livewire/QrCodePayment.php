<?php
namespace App\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;

class QrCodePayment extends Component
{
    public $totalAmount;

    public function mount()
    {
        $this->totalAmount = session('giaHD');
    }

    public function vnpay_payment()
    {
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = route('booking.confirmation');
        $vnp_TmnCode = "1VYBIYQP";
        $vnp_HashSecret = "NOH6MBGNLQL9O9OMMFMZ2AX8NIEP50W1"; // Chuỗi bí mật

        $vnp_TxnRef = rand(00, 9999); // mã đơn hàng
        $vnp_OrderInfo = 'Thanh toán cho five star';
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $this->totalAmount * 100; //  vnd
        $vnp_Locale = 'vn';
        $vnp_IpAddr = request()->ip(); //  ip ng dùng
        $inputData = array(
            "vnp_Version" => "2.1.0",
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

        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }

        return redirect()->away($vnp_Url);
    }

    public function render()
    {
        return view('livewire.qr-code-payment')->extends('layouts.app')->section('content');
    }
}
