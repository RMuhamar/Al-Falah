<!DOCTYPE html>
<html lang="en">

<head>
    <!-- <title><?php echo $page_title; ?> | <?php echo get_settings('system_name'); ?></title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="<?php echo get_settings('author') ?>" />

    <link name="favicon" type="image/x-icon" href="<?php echo base_url() . 'assets/guest/default/img/logo-al-falah.png'; ?>" rel="shortcut icon" /> -->
    <title>Login Admin Al-Falah</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- <link rel="stylesheet" href="../css/style.css"> -->
    <link rel="stylesheet" href="<?php echo base_url() . 'assets/backend/css_login/style.css'; ?>">

</head>

<body class="gray-bg">
    <!-- CONTENT (Start) -->
    <?php $this->load->view($content); ?>
    <!-- CONTENT (End) -->
</body>
<script src="<?php echo base_url() . 'assets/backend/js_login/jquery.min.js'; ?>"></script>
<script src="<?php echo base_url() . 'assets/backend/js_login/popper.js'; ?>"></script>
<script src="<?php echo base_url() . 'assets/backend/js_login/bootstrap.min.js'; ?>"></script>
<script src="<?php echo base_url() . 'assets/backend/js_login/main.js'; ?>"></script>

</html>