<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Crxa Nodes Service</title>
    <link rel="icon" type="image/x-icon" href="component/images/favicon.ico">
    <meta name="description" content="CRXA NODES is a premier individual enterprise dedicated to providing exceptional node and
                            validator services across various networks, with a primary focus on the thriving Cosmos
                            ecosystem. With an unwavering commitment to excellence, we have established ourselves as a
                            trusted partner for network participants, offering reliable infrastructure and comprehensive
                            support to ensure optimal performance, security, and growth">
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
        <!-- Pop-Up Banner -->
        <div class="popup-banner">
            <p>Ini adalah banner pop-up dengan informasi penting.</p>
            <button id="openPopup">Lihat Detail</button>
        </div>
</div>
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

    <!-- Pop-Up Container -->
    <div class="popup-container" id="popupContainer">
        <div class="popup-content">
            <iframe
                src="https://embed.ipfscdn.io/ipfs/bafybeigtqeyfmqkfbdu7ubjlwhtqkdqckvee7waks4uwhmzdfvpfaqzdwm/erc20.html?contract=0x11Cfefe281cc15439ceF86a76d3Db5769cb1C53F&chain=%7B%22name%22%3A%22Linea+Testnet%22%2C%22chain%22%3A%22ETH%22%2C%22rpc%22%3A%5B%22https%3A%2F%2Flinea-testnet.rpc.thirdweb.com%2F%24%7BTHIRDWEB_API_KEY%7D%22%5D%2C%22nativeCurrency%22%3A%7B%22name%22%3A%22Linea+Ether%22%2C%22symbol%22%3A%22ETH%22%2C%22decimals%22%3A18%7D%2C%22shortName%22%3A%22linea-testnet%22%2C%22chainId%22%3A59140%2C%22testnet%22%3Atrue%2C%22slug%22%3A%22linea-testnet%22%2C%22icon%22%3A%7B%22url%22%3A%22ipfs%3A%2F%2FQmURjritnHL7a8TwZgsFwp3f272DJmG5paaPtWDZ98QZwH%22%2C%22width%22%3A97%2C%22height%22%3A102%2C%22format%22%3A%22svg%22%7D%7D&clientId=884b00a0807ee54b59a172b6c49a9f52&primaryColor=orange"
                width="600px"
                height="600px"
                style="max-width:100%;"
                frameborder="0"
            ></iframe>
            <button id="closePopup">Tutup</button>
        </div>
    </div>

    <script>
        const openPopupButton = document.getElementById('openPopup');
        const closePopupButton = document.getElementById('closePopup');
        const popupContainer = document.getElementById('popupContainer');

        openPopupButton.addEventListener('click', () => {
            popupContainer.style.display = 'flex';
        });

        closePopupButton.addEventListener('click', () => {
            popupContainer.style.display = 'none';
        });
    </script>

    <?php include 'component/includes/footer.php' ?>

</body>

</html>