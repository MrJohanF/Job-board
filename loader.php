<script>
    $(document).ready(function() {

        setTimeout(function() {
            $(".loader").fadeOut("fast");
        }, 150);
    });
</script>


<style>
    .show-read-more .more-text {
        display: none;
    }

    .loader {
        position: fixed;
        left: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
        z-index: 9999;
        background: url('img/loader.gif') 50% 50% no-repeat white;
        opacity: .8;
    }
</style>

<div class="loader"></div>