    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="../assets/plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../assets/bootstrap/dist/js/tether.min.js"></script>
    <script src="../assets/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../assets/plugins/bower_components/bootstrap-extension/js/bootstrap-extension.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="../assets/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <script src="../assets/plugins/bower_components/register-steps/jquery.easing.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="../assets/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="../assets/js/waves.js"></script>
    <!--Counter js -->
    <script src="../assets/plugins/bower_components/waypoints/lib/jquery.waypoints.js"></script>
    <script src="../assets/plugins/bower_components/counterup/jquery.counterup.min.js"></script>
    <!--Morris JavaScript -->
    <script src="../assets/plugins/bower_components/raphael/raphael-min.js"></script>
    <script src="../assets/plugins/bower_components/morrisjs/morris.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="../assets/js/custom.min.js"></script>
    <script src="../assets/js/dashboard1.js"></script>
    <!-- Sparkline chart JavaScript -->
    <script src="../assets/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
    <script src="../assets/plugins/bower_components/jquery-sparkline/jquery.charts-sparkline.js"></script>
    <script src="../assets/plugins/bower_components/toast-master/js/jquery.toast.js"></script>
    <script type="text/javascript">
    // $(document).ready(function() {
    //     $.toast({
    //         heading: 'Welcome to Elite admin',
    //         text: 'Use the predefined ones, or specify a custom position object.',
    //         position: 'top-right',
    //         loaderBg: '#ff6849',
    //         icon: 'info',
    //         hideAfter: 3500,
    //         stack: 6
    //     })
    // });
    $(document).ready(function(){
        get_notifications();
        setInterval(get_notifications, 5000);
    });
    function get_notifications(){
        $.ajax({
	        type: "GET", //we are using GET method to get data from server side
	        url: 'notifications.php', // get the route value
	        success: function (response) {//once the request successfully process to the server side it will return result here
	            $('#noti').html(response);
	        }
	    });
    }
    </script>
    <!--Style Switcher -->
    <script src="../assets/plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>