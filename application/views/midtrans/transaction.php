<h3>Transaction Page :</h3>
<hr>
<div class="d-flex justify-content-center">
    <div class="col-sm-5">
        <form action="<?= base_url('midtrans/snap'); ?> " method="POST">
            <div class="mb-3">
                <label for="orderID" class="form-label">Order ID :</label>
                <input type="text" class="form-control" id="orderID" name="orderID" value="<?= $orderID; ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Transaction Description :</label>
                <textarea class="form-control" id="description" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="amount" class="form-label">Amount :</label>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Rp</span>
                    <input type="number" min="0" class="form-control" id="amount" placeholder="0" name="amount">
                </div>
            </div>
            <div class="text-end">
                <button type="submit" class="btn btn-primary">Snap Checkout</button>
            </div>
        </form>
    </div>
</div>