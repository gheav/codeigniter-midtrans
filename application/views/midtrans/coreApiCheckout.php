<h3>Checkout Page :</h3>
<hr>
<div class="row">
    <div class="col-6">
        <h6>Transaction Detail :</h6>
        <table class="table">
            <tr>
                <th>Order ID </th>
                <td>: ORDER-<?= $transaction['orderID']; ?></td>
            </tr>
            <tr>
                <th>Customer Name </th>
                <td>: <?= $transaction['firstName'] . ' ' . $transaction['lastName']; ?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td>: <?= $transaction['email']; ?></td>
            </tr>
            <tr>
                <th>Phone</th>
                <td>: <?= $transaction['phone']; ?></td>
            </tr>
        </table>
        <table class="table">
            <thead>
                <th>#</th>
                <th>Description</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Subtotal</th>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td><?= $transaction['description']; ?></td>
                    <td>1</td>
                    <td>Rp. <?= number_format($transaction['amount']); ?></td>
                    <td>Rp. <?= number_format($transaction['amount']); ?></td>
                </tr>
                <tr>
                    <td class="fw-bold" colspan="4">GRAND TOTAL</td>
                    <td class="fw-bold">Rp. <?= number_format($transaction['amount']); ?></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col-6">
        <h6>Payment Method :</h6>
        <div class="mb-3">
            <select class="form-select" aria-label="Default select example">
                <option value="" selected>-- Choose Payment Method --</option>
                <option value="1">Bank Transfer</option>
            </select>
        </div>
        <div class="mb-3">
            <select class="form-select" aria-label="Default select example">
                <option value="" selected>-- Choose Bank --</option>
                <option value="1">BCA Virtual Account</option>
                <option value="2">BNI Virtual Account</option>
                <option value="3">Mandiri Bill Payment</option>
                <option value="4">Permata Virtual Account</option>
            </select>
        </div>
        <div class="d-grid gap-2">
            <button class="btn btn-primary" type="button" id="pay">Pay !</button>
        </div>

        <div>
            <pre id="result"></pre>
        </div>
    </div>
</div>

<script>
    $('#pay').click(function() {
        var settings = {
            "url": "https://api.sandbox.midtrans.com/v2/charge",
            "method": "POST",
            "timeout": 0,
            "headers": {
                "Accept": "application/json",
                "Content-Type": "application/json",
                "Authorization": "Basic <YOUR SECRET SERVER KEY>"
            },
            "data": JSON.stringify({
                "payment_type": "bank_transfer",
                "transaction_details": {
                    "gross_amount": <?= $transaction['amount'] ?>,
                    "order_id": "<?= $transaction['orderID'] ?>"
                },
                "customer_details": {
                    "email": "<?= $transaction['email'] ?>",
                    "first_name": "<?= $transaction['firstName'] ?>",
                    "last_name": "<?= $transaction['lastName'] ?>",
                    "phone": "<?= $transaction['phone'] ?>"
                },
                "item_details": [{
                    "id": "item01",
                    "price": <?= $transaction['amount'] ?>,
                    "quantity": 1,
                    "name": "<?= $transaction['description'] ?>"
                }],
                "bank_transfer": {
                    "bank": "bca",
                    "va_number": "<?= $transaction['orderID'] ?>"
                }
            }),
        };
        $.ajax(settings).done(function(response) {
            $('#result').html(response);
        });
    });
</script>