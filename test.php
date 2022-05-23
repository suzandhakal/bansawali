<script>
    (function($) {
        $.fn.subcath = function() {
            return this.each(function() {
                obj = $(this);
                var subcath = $('.subcath', obj);
                alert(obj.html());
                obj.click(function() {
                    subcath.toggle('slow');
                });
            });
        }
    })(jQuery);
</script>
<SCRIPT language="JavaScript" SRC="jquery.js"></SCRIPT>
<!-- <SCRIPT language="JavaScript" SRC="my_plugin.js"></SCRIPT> -->
<script>
    $().ready(function() {
        $('.subcath').hide();
        $('.menu').subcath();
    });
</script>

<ul class='menu'>
    <div class="cathegory">
        <li class="cath">Cath1</li>
        <div class="sub_cathegory">
            <ul class="subcath">
                <li class="sub_el">Cath1</li>
                <li class="sub_el">Cath2</li>
            </ul>
        </div>
    </div>
    <div class="cathegory">
        <li class="cath">Cath1</li>
        <div class="sub_cathegory">
            <ul class="subcath">
                <li class="subcath_el">Cath3</li>
                <li class="subcath_el">Cath4</li>
            </ul>
        </div>
    </div>
</ul>