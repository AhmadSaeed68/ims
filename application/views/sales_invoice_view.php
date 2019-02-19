<?php 
	include_once "login/header.php";
 ?>


 <div class=" w3-padding-64">

        <span class="w3-left"> <a href="<?php echo base_url()?>pdf/invoice_pdf" target="_blank" class="w3-right"> <span class="fa fa-file-pdf-o w3-text-red fa-2x"></span> Download</a></span>


        <div class="panel panel-default">
            <a href="largeModal" class="btn btn-primary adddata w3-right"  data-toggle="modal">Make Sale Invoice</a>
            <div class="panel-heading w3-center w3-padding-24">
                <span class=" fa fa-qrcode fa-2x w3-text-red">
                    Sales Invoice
                </span>
                </div> <!-- Modal -->
                <!-- Large Modal HTML -->

                <div class="panel-body">
                    <div class="w3-responsive">
                        <table class="w3-table-all table-bordered w3-hoverable" id="order_data">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th> <span class="fa fa-code-fork w3-text-teal"></span>SO Code</th>
                                    <th><span class="
                                    fa fa-shield w3-text-green"></span> Business/Owner Name</th>


                                    <th> <span class="
                                    fa fa-object-ungroup w3-text-blue"></span>item Code</th>
                                    <th> <span class="fa fa-pencil-square-o w3-text-red"></span>item Qty</th>
                                    <th><span class="fa fa-calendar w3-text-red"></span>Total</th>
                                    <th><span class="fa fa-eye w3-text-blue"></span>Profit</th>
                                        <th><span class="fa fa-eye w3-text-blue"></span>status</th>
                                     <th><span class="fa fa-eye w3-text-blue"></span>View</th>

                                    <th>Action</th>
                                </tr>
                            </thead>
                       

                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php include_once "login/footer.php"; ?>