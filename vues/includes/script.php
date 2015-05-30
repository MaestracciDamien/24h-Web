<script src="vues/js/libs/jquery/dist/jquery.min.js"></script>

<script src="vues/js/libs/bootstrap/dist/js/bootstrap.min.js"></script>

<script src="vues/js/libs/pickadate/lib/picker.js"></script>
<script src="vues/js/libs/pickadate/lib/picker.date.js"></script>

<script>
$(document).ready(function() {
    $('.datepicker').pickadate({
        format: 'yyyy-mm-dd',
        formatSubmit: 'yyyy-mm-dd',
        hiddenName: true
    });
});
</script>