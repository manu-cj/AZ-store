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

        <button id="closeButton" class="closeButton">Close</button>
        <script>
            document.querySelector("#closeButton").addEventListener("click", function(e) {
                document.querySelector("#eventSection").remove();
            })
        </script>
    </dialog>

<?php
    $_SESSION["Payment"] = false;
}
?>