<div class="wrapper">
    <div class="header-top">
        <a href="page_home1.php" class="far fa-arrow-left"></a>
        <div class="search-box" style="width: 90% !important;">
            <input type="text" name="keyword" id='keyword' class="search-input" placeholder="Search for game ..." autocomplete="off" style="width: 100%;margin: 0 10px;" autofocus="true">
            <i class="fas fa-search"></i>
        </div>
    </div>

    <div class="data" style="height: 100vh;"></div>
</div>
<script>
    $(document).ready(function() {
        $('#keyword').on('keyup', function() {
            $.ajax({
                type: 'POST',
                url: 'value.php',
                data: {
                    search: $(this).val()
                },
                cache: false,
                success: function(data) {
                    $('.data').html(data);
                }
            });
        });
    });
</script>