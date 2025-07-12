

     

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['title'] ?></title>
    <link rel="stylesheet" href="<?= _WEB_ROOT ?>/public/css/style.css">
</head>
<body>
    <?php $this->View('blocks/header'); ?>
    <div class="container">
        <?php
            if (isset($data['view_data'])) {
                $this->View($data['content'], $data['view_data']);
            } else {
                $this->View($data['content']);
            }
        ?>
    </div>
    <?php $this->View('blocks/footer'); ?>
    <!-- Đặt ở cuối body -->
<script src="?= _WEB_ROOT ?>/public/js/script.js"></script>

</body>
</html>
