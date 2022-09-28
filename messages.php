<?php
$pageTitle = "Dashboard";
$stylesheet = "messages.css";
require 'templates/header.php';

if ($_SESSION["signed_in"] == false) {
    header("Location: ./index.php");
}
?>
<main class="overflow-hidden">
    <div class="row">
        <div class="col-12 col-md-3 lighter-gray shadow d-flex flex-column align-items-start p-5 vh-md-100">
            <h4 class="text-white pb-3 fw-bold">Friends</h4>
            <div class="friends">
                <div class="lighter-gray-2 p-3 rounded row mt-4">
                    <div class="col-3">
                        <img src="./media/profile_photos/admin.jpg" alt="" class="rounded-circle w-100">
                    </div>
                    <div class="col-9">
                        <div>
                            <h4 class="text-white fw-bold mb-0">Keelan Matthews</h4>
                        </div>
                        <p class="text-white mt-2">Hey man, how are you?</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-7">
            <div class="container">
                <div class="d-flex flex-column justify-content-between vh-100">
                    <div>
                        <div class="lighter-gray p-3 rounded row mt-3">
                            <div class="col-1">
                                <img src="./media/profile_photos/admin.jpg" alt="" class="rounded-circle w-100">
                            </div>
                            <div class="col-11 d-flex align-items-center">
                                <h4 class="text-white fw-bold mb-0">Keelan Matthews</h4>
                            </div>
                        </div>
                        <div class="messages d-flex flex-column mt-3 align-items-start">
                            <div class="my-message text-white p-3 rounded-pill lighter-gray-2 align-self-end">
                                <p class="mb-0">Hey my dudeeeee</p>
                            </div>
                            <div class="friend-message text-white p-3 px-4 rounded-pill bg-primary">
                                <p class="mb-0">Hey man, how are you?</p>
                            </div>
                        </div>
                    </div>

                    <div class="text-bar mb-3">
                        <div class="d-flex align-items-center">
                            <input type="text" class="form-control rounded-pill border-0" style="height:50px;" placeholder="Type a message...">
                            <button class="btn btn-primary rounded-pill ms-3" style="height:50px; width:50px;">
                                <i class="fas fa-paper-plane"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php require 'templates/nav.php' ?>
    </div>
</main>
<?php
$scriptsheet = "messages.js";
require 'templates/footer.php';
?>