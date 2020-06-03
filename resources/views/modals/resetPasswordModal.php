<?php
require_once ADMINS_INCLUDES . 'actions.php';
require_once FORMS . 'forms_handler.php';
?>
<!-- Modal -->
<div class="modal fade" id="resetPassWordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Reset Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post">
                    <?=inputBox('text', 'resetPassword', 'Reset Password', 'form-group', 'form-control', 'resetPassword',
                    'resetPassword', '', 'Reset Password')?>
                    <?=btnButton('submit', 'Reset', 'btn btn-primary', 'resetPassword')?>
                </form>
            </div>
        </div>
    </div>
</div>