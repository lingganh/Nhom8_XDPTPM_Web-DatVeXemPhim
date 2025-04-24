<?php
namespace App\Livewire;

use App\Models\SanPham;
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
        $vnp_Returnurl = route('ketqua');
        $vnp_TmnCode = "OCYUNIZL";
        $vnp_HashSecret = "8A72ZRRYHRPB44D9OG1YY51QMMKQC4OX"; // Chuỗi bí mật

        $vnp_TxnRef = rand(00, 9999); // mã đơn hàng
        $vnp_OrderInfo = 'Thanh toán cho five star';
        $vnp_OrderType = 'billpayment';
       $vnp_Amount = $this->totalAmount * 100; //  vnd
        //$vnp_Amount = 2000 * 100; //  test
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
    public function render (Request $request){
        //mảng món ăn
        $selectedFood = $request->input('food', []);
        //dd($selectedFood);
        $lichChieuId = session('lich_chieu_id');
        $selectedSeats = session('selected_seats');
        $seatPrice = 75000;
        $totalSeatPrice = count($selectedSeats) * $seatPrice;

        session(['total_seat_price' => $totalSeatPrice]);        $giadoan=0;
        $spchon=SanPham::find(array_keys($selectedFood));

        if($spchon){
            foreach ($spchon as $sp) {

                $soluong = $selectedFood[$sp->idsp]??0;
                $giadoan += $sp->donGia *$soluong;
            }
        }


        session(['giaHD' => $giadoan]);

        return view('livewire.qr-code-payment', compact('selectedSeats', 'selectedFood', 'giadoan', 'spchon','totalSeatPrice'))->extends('layouts.app')->section('content');


    }
    public function vnpay_return(Request $request)
    {
        $vnp_HashSecret = "8A72ZRRYHRPB44D9OG1YY51QMMKQC4OX"; // Chuỗi bí mật của bạn
        $vnp_SecureHash = $request->input('vnp_SecureHash');
        $inputData = $request->except('vnp_SecureHash');
        ksort($inputData);
        $hashdata = "";
        $i = 0;
        $hashSecret = $vnp_HashSecret;
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
        }

        $secureHash = hash_hmac('sha512', $hashdata, $hashSecret);

        if ($secureHash == $vnp_SecureHash) {
            $vnp_ResponseCode = $request->input('vnp_ResponseCode');
            $vnp_TxnRef = $request->input('vnp_TxnRef'); // Mã đơn hàng bạn đã gửi
            $vnp_TransactionNo = $request->input('vnp_TransactionNo'); // Mã giao dịch tại VNPAY
            $vnp_Amount = $request->input('vnp_Amount') / 100; // Số tiền thanh toán

            if ($vnp_ResponseCode == '00') {
                return redirect()->route('payment.success');
            } else {
                return redirect()->route('payment.failure')->with('error', 'Thanh toán thất bại. Mã lỗi: ' . $vnp_ResponseCode);
            }
        } else {
             return redirect()->route('payment.failure')->with('error', 'Chữ ký không hợp lệ!');
        }
    }

}
