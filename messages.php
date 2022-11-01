<?php
$pageTitle = "Inbox";
$stylesheet = "messages.css";
require 'templates/header.php';

if ($_SESSION["signed_in"] == false) {
    header("Location: ./index.php");
}
?>
<main class="overflow-hidden">
    <div class="row">
        <div class="col-12 col-md-3 lighter-gray shadow d-flex flex-column align-items-start p-5 vh-md-100" id="friend-list">
            <h4 class="text-white pb-3 fw-bold">Friends</h4>
            <div class="friends pb-5 pb-md-0">
            </div>
        </div>
        <div class="col-12 col-md-7">
            <div class="container">
                <div class="d-flex flex-column justify-content-between vh-100">
                    <div>
                        <div class="lighter-gray p-3 rounded row mt-3 d-none" id="friend_info">
                            <div class="col-2 col-lg-1">
                                <img src="" alt="" class="rounded-circle w-100" id="friend_profile_photo">
                            </div>
                            <div class="col-10 col-lg-11 d-flex align-items-center">
                                <h4 class="text-white fw-bold mb-0" id="friend_username"></h4>
                            </div>
                        </div>
                        <div class="messages d-flex flex-column mt-3 align-items-start">
                        </div>
                    </div>

                    <div class="text-bar mb-5 mb-md-3 pb-5 pb-md-0 d-none">
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