<form id="payment-form" method="post" action="{{ route('payments.crypto.pay) }}">
  @csrf
  <input type="text" name="amountUSD" placeholder="Amount">
    <input type="hidden" name="userID" value="{{ Auth::user()->id }}">
  <input type="hidden" name="orderID" value="1">
  <input type="hidden" name="redirect" value="{{ url()->full() }}">
  <button type="submit">Pay</button>
</form>  