import { encodeVietQr } from 'vn-qr-pay';

document.addEventListener('DOMContentLoaded', function () {

    const qrcodeDiv = document.getElementById('qrcode');
    const paymentData = window.paymentData; // Lấy dữ liệu thanh toán từ Blade view

    if (qrcodeDiv && paymentData) {
        const code = encodeVietQr({
            account: paymentData.accountNo,
            bank: paymentData.bankCode,
            amount: paymentData.amount,
            additionalData: {
                purpose: 'Thanh toan ve xem phim',
            }
        });

         const qrcode = new QRCode(qrcodeDiv, {
            text: code,
            width: 256,
            height: 256,
            colorDark : "#000000",
            colorLight : "#ffffff",
            correctLevel : QRCode.CorrectLevel.H
        });
    }
});
