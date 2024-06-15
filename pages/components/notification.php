<?php
if (!isset($_SESSION['Payment'])) {
    $_SESSION['Payment'] = false;
}

if ($_SESSION["Payment"] == true) {
?>
    <dialog id="eventSection" class="eventSection" open>

        <h2>Successful purchase</h2>

        <div id="event" class="event">
            <p>
                thank you for your purchase.
            </p>
        </div>

        <!-- <button id="closeButton" class="closeButton">Close</button> -->
        <script>
            // document.querySelector("#closeButton").addEventListener("click", function(e) {
            //     document.querySelector("#eventSection").remove();
            // })
            setTimeout(function(e) {
                document.querySelector("#eventSection").remove();
            }, 5000)
        </script>
    </dialog>

    <style>
       .eventSection {
            width: 100%;
            background: none;
            border: none;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .notif {
            width: 300px;
            height: 80px;
            padding: 5px;
            background-color: rgb(100, 200, 0, 0.8);
            border-radius: 5px;
            text-align: center;
            backdrop-filter: blur(5px);
        }

        @media only screen and (max-width: 720px) {
            .eventSection {
                width: 80%;
                left: 10%;
            }
        }

        /* .closeButton {
            margin: 1%;
            padding: 1%;
            border-radius: 0.5em;
            background-color: rgb(0, 0, 0, 0.1);
        } */
    </style>

<?php
    $_SESSION["in-cart"] = false;
}
?>
<?php
if (!isset($_SESSION['in-cart'])) {
    $_SESSION['in-cart'] = false;
}

if ($_SESSION["in-cart"] == true) {
?>
    <dialog id="eventSection" class="eventSection" open>
        <div class="notif">
            <h5>Add in cart successful</h5>

            <div id="event" class="event">
                <p>
                    thank you for your purchase.
                </p>
            </div>
        </div>


        <!-- <button id="closeButton" class="closeButton">Close</button> -->
        <script>
            // document.querySelector("#closeButton").addEventListener("click", function(e) {
            //     document.querySelector("#eventSection").remove();
            // })
            setTimeout(function(e) {
                document.querySelector("#eventSection").remove();
            }, 5000)
        </script>
    </dialog>

    <style>
        .eventSection {
            width: 100%;
            background: none;
            border: none;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .notif {
            width: 300px;
            height: 80px;
            padding: 5px;
            background-color: rgb(100, 200, 0, 0.8);
            border-radius: 5px;
            text-align: center;
            backdrop-filter: blur(5px);
        }

        @media only screen and (max-width: 720px) {
            .eventSection {
                width: 40%;
                left: 10%;
            }
        }

        /* .closeButton {
            margin: 1%;
            padding: 1%;
            border-radius: 0.5em;
            background-color: rgb(0, 0, 0, 0.1);
        } */
    </style>

<?php
    $_SESSION["in-cart"] = false;
}
?>