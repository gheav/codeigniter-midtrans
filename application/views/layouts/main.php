<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Codeiginiter - Midtrans!</title>
    <link rel="shortcut icon" href="<?= base_url('assets/images/codeigniter.jpg'); ?> " type="image/x-icon">
    <!-- Bootstrap CSS & JS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="<YOUR CLIENT SECRET KEY>"></script>
    <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light ">
            <div class="container-fluid">
                <a class="navbar-brand" href="<?= base_url(); ?> "> <img src="<?= base_url('assets/images/codeigniter.jpg'); ?>" class="img-fluid" alt="Codeigniter Logo" width="50" height="24"> CI-Midtrans</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('snap'); ?> ">Snap Checkout</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('MobileSDK'); ?> ">Mobile SDK</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('CoreApi'); ?> ">Core API</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('MockPayment'); ?> ">Mock Payment</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="card mt-2">
            <div class="card-body">
                <?php $this->load->view($content); ?>
            </div>
        </div>
    </div>
</body>

</html>