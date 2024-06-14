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
            width: 40%;
            left: 30%;
            top: 40%;
            background-color: rgb(0, 200, 0, 0.3);
            border-radius: 1em;
            text-align: center;

            backdrop-filter: blur(5px);

        }

        /* .closeButton {
            margin: 1%;
            padding: 1%;
            border-radius: 0.5em;
            background-color: rgb(0, 0, 0, 0.1);
        } */
    </style>

<?php
    $_SESSION["Payment"] = false;
}
?>