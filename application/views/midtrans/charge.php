<h3>Merchant Server for Mobile SDK</h3>
<div class="row">
    <div class="col-6">
        <hr>
        <p>
            This is a example mobile SDK server for Midtrans's iOS and Android SDK, as an implementation reference to use the mobile sdk
        </p>
        <h5>Endpoint</h5>
        <p>
            There is only one endpoint that are required to use Midtrans mobile SDK:
            <b><?= base_url() ?>MobileSDK/charge</b>
            <br>
            This endpoint will proxy (forward) client request to Midtrans Snap API
        <pre>'https://app.midtrans.com/snap/v1/transactions'</pre> or
        <pre>'https://app.sandbox.midtrans.com/snap/v1/transactions'</pre>
        <br>
        with HTTP Authorization Header generated based on your Midtrans Server Key

        </p>
        <p>The response of API will be printed/returned to client as is. Example response that will be printed</p>
        <pre>{
    "token": "413ae932-471d-4c41-bfb4-e558cc271dcc",
    "redirect_url": "https://app.sandbox.midtrans.com/snap/v2/vtweb/413ae932-471d-4c41-bfb4-e558cc271dcc"
}</pre>
        <h5>Testing</h5>
        <p>You can mock client's request by executing this CURL command to the
            <b><?= base_url() ?>MobileSDK/charge</b> endpoint:
        </p>
        <pre>
curl -X POST -d '{  
   "transaction_details":{  
      "order_id":"mobile-12345",
      "gross_amount":280000
   }
}' "<?= base_url() ?>MobileSDk/charge"
        </pre>

    </div>
    <div class="col-6">
        <img src="https://mobile-docs.midtrans.com/images/general-flow.png" alt="Flowchart" srcset="">
    </div>
</div>