<div class="container" style="margin: 60px 0 0 0;background-color: transparent">
    <?php
    if (isset($_POST['search'])) {
        require_once "config/database.php";
        $search = $_POST['search'];

        $query = mysqli_query($conn, "SELECT * FROM cobaina1_cheatshop.product WHERE nm_prdct LIKE '%" . $search . "%' ");
        while ($row = mysqli_fetch_object($query)) {
    ?>
            <a href="product_1.php?id=<?= $row->id_product; ?>" >
                <div class="row side" style="border: rgb(218, 226, 237) solid 1px;padding: 8px;margin: 5px 1rem;background-color: #ffffff">
                    <h1 class="title-item" style="font-size: 14px;margin: 0;">
                        <span><?= $row->nm_prdct ?></span>
                    </h1>
                </div>
            </a>

    <?php
        }
    }
    ?>
</div>