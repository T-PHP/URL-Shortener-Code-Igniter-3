<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
</div>

<footer class="text-white">
    <div class="contain mb0">
        <div class="row">
            <div class="col-6">
                <p class="text-left">
                    <a href="#"><?= $back_top; ?></a>
                </p>
            </div>
            <div class="col-6">
                <p class="text-right">
                    <?= $created_with; ?> <i class="fa fa-heart"></i> <?= $by; ?> <a href="https://t-php.fr/"><i>t-php</i></a> |
                    <span>v.0.1</span>
                    <a href=""><i class="fab fa-github"></i></a>
                </p>
            </div>
        </div>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
<!-- Menu -->
<script type="text/javascript">
    $( ".button-menu" ).click(function() {
        $(".menu-body").show();
    });
    $( ".button-close" ).click(function() {
        $(".menu-body").hide();
    });
    $(window).resize(function() {
        if ($(window).width() > 768) {
            $(".menu-body").show();
        }
        else {
            $(".menu-body").hide();
        }
    });
</script>
<!-- Copy URL -->
<script type="text/javascript">
    $('.copy-btn').on("click", function(){
        value = $(this).data('clipboard-text'); //Upto this I am getting value

        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val(value).select();
        document.execCommand("copy");
        $temp.remove();
        $(".copy-message").show();
    })
</script>
</body>
</html>

