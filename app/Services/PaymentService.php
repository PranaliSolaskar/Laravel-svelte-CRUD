namespace App\Services;

use App\Models\Payment;

class PaymentService
{
    public function makePayment($amount)
    {
        $payment = new Payment();
        $payment->amount = $amount;
        $payment->customer_id = $customerId;
        $payment->save();
        //  payment gateway, log payment details, send email receipts, etc.

        return $payment; 
    }

    public function getPaymentsByCustomer($customerId)
    {
        return Payment::where('customer_id', $customerId)->get();
    }
    
}
