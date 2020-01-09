<iframe id="vif_form_survey" src="" width="100%" height="628" frameborder="0" marginheight="0" marginwidth="0">Đang tải…</iframe>
<script src="<?php echo get_template_directory_uri() . '/vif/assets/js/jquery-1.12.4.min.js' ?>"></script>
<script type="application/javascript">
    $(document).ready(function () {
        var iframe = document.getElementById('vif_form_survey');
        iframe.src = '<?php echo isset($form_url) ? $form_url : ''; ?>/viewform?embedded=true';
    });
</script>