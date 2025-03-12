<h1>Expense voucher email</h1>
<div>
    <embed src="{{ $message->embed(Storage::disk('public')->path($pdf_path)) }}" width="500" height="375">
  </div>
