<h3>Transaction Page :</h3>
<hr>

<div class="row">
    <div class="col-6">
        <h5 class="fw-bold">Customer Detail</h5>
        <div class="mb-3">
            <div class="row g-3">
                <div class="col-6">
                    <label for="firstName" class="form-label">Firstname</label>
                    <input type="text" class="form-control" id="firstName" name="firstName">
                </div>
                <div class="col-6">
                    <label for="lastName" class="form-label">Lastname</label>
                    <input type="text" class="form-control" id="lastName" name="lastName">
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone Number</label>
            <input type="text" class="form-control" id="phone" name="phone" placeholder="08xxxxxxx">
        </div>

    </div>
    <div class="col-6">
        <h5 class="fw-bold">Transaction Detail</h5>
        <div class="mb-3">
            <label for="orderID" class="form-label">Order ID :</label>
            <input type="text" class="form-control" id="orderID" name="orderID" value="<?= $orderID; ?>" readonly>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Transaction Description :</label>
            <textarea class="form-control" id="description" name="description" rows="1"></textarea>
        </div>
        <div class="mb-3">
            <label for="amount" class="form-label">Amount :</label>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Rp</span>
                <input type="number" min="0" class="form-control" id="amount" placeholder="0" name="amount" required>
            </div>
        </div>
    </div>
</div>
<div class="text-end">
    <button type="button" class="btn btn-primary" id="checkout">Snap Checkout</button>
</div>

<hr>
<div class=" ">
    <h3 class="fw-bold"> Midtrans Payment</h3>

    <h4>Snap Token :</h4>
    <h5 class="my-3" id="snapTokenText"><i></i></h5>

    <pre> JSON result will appear here after payment:</pre>

    <pre><p id="result-json"></p></pre>

</div>

<script type="text/javascript">
    document.getElementById('checkout').onclick = function() {
        const firstName = $("#firstName").val();
        const lastName = $("#lastName").val();
        const email = $("#email").val();
        const phone = $("#phone").val();
        const orderID = $("#orderID").val();
        const description = $("#description").val();
        const amount = $("#amount").val();
        $.ajax({
            url: "<?= base_url('snap/checkout'); ?>",
            method: "POST",
            data: {
                firstName: firstName,
                lastName: lastName,
                email: email,
                phone: phone,
                orderID: orderID,
                description: description,
                amount: amount
            },
            success: function(snapToken) {
                $("#snapTokenText").html(snapToken);
                snap.pay(snapToken, {
                    // Optional
                    onSuccess: function(result) {
                        /* You may add your own js here, this is just example */
                        document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                    },
                    // Optional
                    onPending: function(result) {
                        /* You may add your own js here, this is just example */
                        document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                    },
                    // Optional
                    onError: function(result) {
                        /* You may add your own js here, this is just example */
                        document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                    }
                });
            }
        });
        // SnapToken acquired from previous step
    };
</script>