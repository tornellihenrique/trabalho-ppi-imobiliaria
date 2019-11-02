<?php

class Toast
{

public static function showToast($message)
{
    $toastId = rand(0, 100);

    echo <<<HTML
    <div style='position: fixed; bottom: 10px; right: 10px; z-index: 1000;'>
        <div id="toast-$toastId" class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="4000">
            <div class="toast-header p-3">
                <h4 class="mb-0 mr-3">$message</h4>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <script>
            $(document).ready(function () {
                $("#toast-$toastId").toast('show');
                $('#toast-$toastId').on('hidden.bs.toast', function () {
                    $('#toast-$toastId').remove();
                });
            });
            </script>
        </div>      
    </div>
    HTML;
}
}

?>
