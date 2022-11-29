<!-- JavaScript Plugins -->
<script src="js/libs/jquery-1.8.3.min.js"></script>
    <script src="js/libs/jquery.mousewheel.min.js"></script>
    <script src="js/libs/jquery.placeholder.min.js"></script>
    <script src="custom-plugins/fileinput.js"></script>
    
    <!-- jQuery-UI Dependent Scripts -->
    <script src="jui/js/jquery-ui-1.9.2.min.js"></script>
    <script src="jui/jquery-ui.custom.min.js"></script>
    <script src="jui/js/jquery.ui.touch-punch.js"></script>

    <!-- Plugin Scripts -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <!--[if lt IE 9]>
    <script src="js/libs/excanvas.min.js"></script>
    <![endif]-->
    <script src="plugins/flot/jquery.flot.min.js"></script>
    <script src="plugins/flot/plugins/jquery.flot.tooltip.min.js"></script>
    <script src="plugins/flot/plugins/jquery.flot.pie.min.js"></script>
    <script src="plugins/flot/plugins/jquery.flot.stack.min.js"></script>
    <script src="plugins/flot/plugins/jquery.flot.resize.min.js"></script>
    <script src="plugins/colorpicker/colorpicker-min.js"></script>
    <script src="plugins/validate/jquery.validate-min.js"></script>
    <script src="custom-plugins/wizard/wizard.min.js"></script>

    <!-- Core Script -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/core/mws.js"></script>

    <!-- Themer Script (Remove if not needed) -->
    <script src="js/core/themer.js"></script>

    <!-- Demo Scripts (remove if not needed) -->
    <script src="js/demo/demo.dashboard.js"></script>

    <!-- JavaScript Plugins -->
    <script src="js/libs/jquery-1.8.3.min.js"></script>


    
    <!-- jQuery-UI Dependent Scripts -->
    <script src="jui/js/globalize/globalize.js"></script>
    <script src="jui/js/globalize/cultures/globalize.culture.en-US.js"></script>

    <!-- Plugin Scripts -->
    <script src="custom-plugins/picklist/picklist.min.js"></script>
    <script src="plugins/autosize/jquery.autosize.min.js"></script>
    <script src="plugins/select2/select2.min.js"></script>
    <script src="plugins/ibutton/jquery.ibutton.min.js"></script>
    <script src="plugins/cleditor/jquery.cleditor.min.js"></script>
    <script src="plugins/cleditor/jquery.cleditor.table.min.js"></script>
    <script src="plugins/cleditor/jquery.cleditor.xhtml.min.js"></script>
    <script src="plugins/cleditor/jquery.cleditor.icon.min.js"></script>

    <!-- Demo Scripts (remove if not needed) -->
    <script src="js/demo/demo.formelements.js"></script>

    <!-- JavaScript Plugins -->
    <script src="js/libs/jquery-1.8.3.min.js"></script>
    <script src="js/libs/jquery.mousewheel.min.js"></script>
    <script src="js/libs/jquery.placeholder.min.js"></script>
    <script src="custom-plugins/fileinput.js"></script>
    
    <!-- jQuery-UI Dependent Scripts -->
    <script src="jui/js/jquery-ui-1.9.2.min.js"></script>
    <script src="jui/jquery-ui.custom.min.js"></script>
    <script src="jui/js/jquery.ui.touch-punch.js"></script>

    <script src="jui/js/globalize/globalize.js"></script>
    <script src="jui/js/globalize/cultures/globalize.culture.en-US.js"></script>

    <!-- Plugin Scripts -->
    <script src="plugins/autosize/jquery.autosize.min.js"></script>
    <script src="plugins/colorpicker/colorpicker-min.js"></script>
    <script src="plugins/validate/jquery.validate-min.js"></script>

    <!-- Demo Scripts (remove if not needed) -->
    <script src="js/demo/demo.formelements.js"></script>

<script>
$("#<?php echo $page = substr($cp,0,-4);?>").parent('ul').removeClass('closed');
$("#<?php echo $page = substr($cp,0,-4);?>").parent('ul').parent().addClass('active');
$("#<?php echo $page = substr($cp,0,-4);?>").addClass('myactive active');
$('#mws-logo-wrap a').css('color',$('#mws-username').css('color'));
$("input").keypress(function (evt) { var charCode = evt.charCode || evt.keyCode; if (charCode  == 13) { return false; }});
</script>


<script> $(document).ready(function() { $("#my_overlay").fadeOut();

 	//$(".mws-datatable").dataTable({"iDisplayLength": <?php echo $_SESSION['user']['table_row']?>});
     	//$(".mws-datatable-fn").dataTable({sPaginationType: "full_numbers", "iDisplayLength": <?php echo $_SESSION['user']['table_row']?>});
     	
     	$(".mws-datatable").dataTable({"iDisplayLength": 25});
     	$(".mws-datatable-fn").dataTable({sPaginationType: "full_numbers", "iDisplayLength": 25});

 }); </script>

 