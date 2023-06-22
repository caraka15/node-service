<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Crxa Nodes Service</title>
    <link rel="icon" type="image/x-icon" href="component/images/favicon.ico">
    <meta charset="UTF-8" />
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.css" />
    <link rel="stylesheet" href="component/css/style.css" />
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-QPBYJDLTQE"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-QPBYJDLTQE');
    </script>
</head>

<body>
    <!-- partial:index.partial.html -->
    <?php include 'component/includes/header.php' ?>

    <div class="container mt-5">
        <div id="mainnet" class="chaind">
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="type-header">
                    <h2>Mainnet</h2>
                </div>

                <div class="chaind-container">
                    <?php include 'src/mainnet_content.php' ?>
                </div>
            </div>
        </div>
        <div id="testnet" class="chaind">
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="type-header">
                    <h2>Testnet</h2>
                </div>

                <div class="chaind-container">
                    <?php include 'src/testnet_content.php' ?>
                </div>
            </div>
        </div>
    </div>

    <?php include 'component/includes/footer.php' ?>

</body>

</html>