<?php include_once "login/header.php";
?>
<p class='w3-code w3-smoke'><?php echo "Today is " . date("Y/m/d") . "<br>";?></p>
<!-- s -->
<!-- <div class='jumbotron'>
    <h1 class='w3-center'><span class='     fa fa-themeisle w3-text-gray'> </span> Invoice Detail</h1>
</div> -->
<div class="row">
    <div class="container-fluid">
        <div class="col-sm-2">
            <nav class="w3-sidebar w3-bar-block w3-collapse w3-white w3-animate-left w3-card" style="z-index:3;width:230px;" id="mySidebar">
                
                  <a href="largeModal" class="btn btn-primary w3-bar-item w3-button w3-border-bottom w3-large adddata w3-right"  data-toggle="modal">Make Invoice <i class="w3-padding fa fa-pencil"></i></a>
                <a href="javascript:void(0)" onclick="w3_close()" title="Close Sidemenu"
                class="w3-bar-item w3-button w3-hide-large w3-large">Close <i class="fa fa-remove"></i></a>
                 
                <a href="javascript:void(0)" class="w3-bar-item w3-button w3-dark-grey w3-button w3-hover-black w3-left-align" onclick="document.getElementById('id01').style.display='block'">New Message <i class="w3-padding fa fa-pencil"></i></a>
                <a id="myBtn" onclick="myFunc('Demo1')" href="javascript:void(0)" class="w3-bar-item w3-button"><i class="fa fa-inbox w3-margin-right"></i>Search Records (3)<i class="fa fa-caret-down w3-margin-left"></i></a>
                <div id="Demo1" class="w3-hide w3-animate-left">
                    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-border-bottom test w3-hover-light-grey" onclick="openMail('Borge');w3_close();" id="firstTab">
                        <div class="w3-container">
                            <form action="/action_page.php" target="_blank">
                                <p><label><i class="fa fa-calendar-check-o"></i> From</label></p>
                                <input class="w3-input w3-border" type="date" placeholder="DD MM YYYY" name="from_date" required>
                                <p><label><i class="fa fa-calendar-o"></i> TO</label></p>
                                <input class="w3-input w3-border" type="date" placeholder="DD MM YYYY" name="to_date" required>
                                <p><label><i class="fa fa-male"></i> Days</label></p>
                                <input class="w3-input w3-border" type="number" value="1" name="Adults">
                                
                                <p><button class="w3-button w3-block w3-green w3-left-align" type="submit"><i class="fa fa-search w3-margin-right"></i> Generate</button></p>
                            </form>
                        </div>
                    </a>
                    
                    
                    
                    
                    
                </div>
                <a href="#" class="w3-bar-item w3-button"><i class="fa fa-paper-plane w3-margin-right"></i>Sent</a>
                <a href="#" class="w3-bar-item w3-button"><i class="fa fa-hourglass-end w3-margin-right"></i>Drafts</a>
                <a href="#" class="w3-bar-item w3-button"><i class="fa fa-trash w3-margin-right"></i>Trash</a>
            </nav>
            <!-- Modal that pops up when you click on "New Message" -->
            <div id="id01" class="w3-modal" style="z-index:4">
                <div class="w3-modal-content w3-animate-zoom">
                    <div class="w3-container w3-padding w3-red">
                        <span onclick="document.getElementById('id01').style.display='none'"
                        class="w3-button w3-red w3-right w3-xxlarge"><i class="fa fa-remove"></i></span>
                        <h2>Send Mail</h2>
                    </div>
                    <div class="w3-panel">
                        <label>To</label>
                        <input class="w3-input w3-border w3-margin-bottom" type="text">
                        <label>From</label>
                        <input class="w3-input w3-border w3-margin-bottom" type="text">
                        <label>Subject</label>
                        <input class="w3-input w3-border w3-margin-bottom" type="text">
                        <input class="w3-input w3-border w3-margin-bottom" style="height:150px" placeholder="What's on your mind?">
                        <div class="w3-section">
                            <a class="w3-button w3-red" onclick="document.getElementById('id01').style.display='none'">Cancel  <i class="fa fa-remove"></i></a>
                            <a class="w3-button w3-light-grey w3-right" onclick="document.getElementById('id01').style.display='none'">Send  <i class="fa fa-paper-plane"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-10">
            <div class="w3-container">
                <span class="w3-left"> <a href="<?php echo base_url()?>pdf/invoice_pdf" target="_blank" class="w3-right"> <span class="fa fa-file-pdf-o w3-text-red fa-2x"></span> Download</a></span>
                <div class="panel panel-default">
                    <a href="largeModal" class="btn btn-primary adddata w3-right"  data-toggle="modal">Make Invoice</a>
                    <div class="panel-heading w3-center w3-padding-24">
                        <span class=" fa fa-qrcode fa-2x w3-text-red">
                            PO Invoice
                        </span>
                        </div> <!-- Modal -->
                        <!-- Large Modal HTML -->
                        <div class="panel-body">
                            <div class="w3-responsive">
                                <table class="w3-table-all table-bordered w3-hoverable" id="order_data">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th> <span class="fa fa-code-fork w3-text-teal"></span>Po Code</th>
                                            <th><span class="
                                            fa fa-shield w3-text-green"></span> Invoice Code</th>
                                            <th> <span class="
                                            fa fa-object-ungroup w3-text-blue"></span>Invoice Total</th>
                                            <th> <span class="fa fa-pencil-square-o w3-text-red"></span>Invoice Desc</th>
                                            <th><span class="fa fa-calendar w3-text-red"></span>Inv Date</th>
                                            <th><span class="fa fa-eye w3-text-blue"></span>View</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($po_invoice as $data):?>
                                        <tr>
                                            <td><?= $data['id'];?></td>
                                            <td><?= $data['po_code']?></td>
                                            <td><?= $data['invoice_code']?></td>
                                            <td><?= $data['invoice_total']?></td>
                                            <td><?= $data['invoice_description']?></td>
                                            <td><?= $data['invoice_date']?></td>
                                            <td><span class="fa fa-eye w3-text-blue"><a class="view" id="<?=$data['id']?>"> View</a></span></td>
                                            <td>
                                                <?php
                                                if ($id->type=='super_user' OR $id->type=='user') {
                                                echo "<span class='w3-text-red fa fa-warning '>  Access Forbidden</span>";
                                                }
                                                else{
                                                ?>
                                                <div class="dropdown">
                                                    <button class="btn w3-orange btn-default dropdown-toggle" type="button" data-toggle="dropdown">Action
                                                    <span class="caret"></span></button>
                                                    <ul class="dropdown-menu">
                                                        <li><input type="button" class="w3-button w3-block w3-teal edit" value="Edit" id="<?php echo $data['id']; ?>"></li>
                                                        <li><input type="button" class="w3-button w3-block w3-red  delete" value="Delete" id="<?php echo $data['id']; ?>"></li>
                                                    </ul>
                                                </div>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                        <?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true" style="margin-top: -20px;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header ">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel"></h4>
                </div>
                <div class="modal-body">
                    <!-- Place to print the fetched phone -->
                    <div id="result">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div id="largeModal" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <legend class="w3-center w3-padding">
                        <h1 class="w3-text-green">Make Invoice</h1>
                    </legend>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <form id="make_invoice">
                            <div class="col-sm-6 col-md-7">
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="pwd">Po Code:</label>
                                        <span id="po_code"  name="po_code" class="show_data po_code"></span>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="pwd">Invoice Code:</label>
                                        <!-- <input type="text" class="form-control" name="invoice_code" id="invoice_code"> -->
                                        <span id="auto_po_invoice"></span>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="email" class="w3-center">Invoice Description</label>
                                        <textarea rows="5" name="invoice_description" id="invoice_description" required="" cols="25"></textarea>
                                    </div>
                                </div>
                                <div class="form-row" id='po_return'>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <!-- /ADD MORE/ -->
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-success" name="submit" id="submit" value="Make Invoice">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script>
        var openInbox = document.getElementById("myBtn");
        openInbox.click();
        function w3_open() {
        document.getElementById("mySidebar").style.display = "block";
        document.getElementById("myOverlay").style.display = "block";
        }
        function w3_close() {
        document.getElementById("mySidebar").style.display = "none";
        document.getElementById("myOverlay").style.display = "none";
        }
        function myFunc(id) {
        var x = document.getElementById(id);
        if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
        x.previousElementSibling.className += " w3-red";
        } else {
        x.className = x.className.replace(" w3-show", "");
        x.previousElementSibling.className =
        x.previousElementSibling.className.replace(" w3-red", "");
        }
        }
        </script>
        <!--
        *************************************************
        MODAL DATA AFTER GETTING DATA FROMM EDIT FUNCTION
        **************************************************
        $.ajax({
        url: "<?php echo base_url() ?>invoice_controller/auto_po_invoice",
        method: "POST",
        success: function(data)
        {
        $('#auto_po_invoice').html(data);
        }
        });
        -->
        <!-- jQuery JS CDN -->
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <!-- jQuery DataTables JS CDN -->
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <!-- Bootstrap JS CDN -->
        <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
        <!-- Bootstrap JS CDN -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script>
    $(document).ready(function(){
    var dataTable=$("#order_data").dataTable();
    });
    $.ajax({
    url: "<?php echo base_url() ?>invoice_controller/auto_po_invoice",
    method: "POST",
    success: function(data)
    {
    $('#auto_po_invoice').html(data);
    }
    });
    /********GET ID FROM INVOICE ID */
    $(document).ready(function(){
    $('#dataTable').DataTable();
    $('.edit').click(function(){
    var invoice_id = $(this).attr('id');
    $.ajax({
    url: "<?php echo base_url() ?>invoice_controller/edit_invoice",
    method: "POST",
    data: {invoice_id:invoice_id},
    success: function(data)
    {
    // Print the fetched data of the selected order in the modal
    // within the Bootstrap modal
    $('#result').html(data);
    // Display the Bootstrap modal
    $('#Modal').modal('show');
     $('.modal-title').html("<i class='fa fa-plus'></i> <span class='w3-text-orange'>Update Invocie</span> ");
    }
    });
    });
    });
    $(document).on('submit','#invoice_update',function(event){
    event.preventDefault();
    var id=$('#id').val();
    var po_code=$('#po_code').val();
    var item_rate=$('#item_rate').val();
    var invoice_code=$('#invoice_code').val();
    var item_code=$('#item_code').val();
    var item_qty=$('#item_qty').val();
    var invoice_total=$('#invoice_total').val();
    var date=$('#date').val();
    var invoice_description=$('#invoice_description').val();
            $.ajax({
            url: "<?php echo base_url() ?>invoice_controller/update_invoice",
            method:"POST",
                data:{
                    id:id,po_code:po_code,invoice_description:invoice_description
                    ,item_code:item_code,item_qty:item_qty,item_rate:item_rate,date:date,invoice_code:invoice_code,invoice_total:invoice_total
                    ,},
            datatype:"json",
                success:function(data)
                {
                alert(data);
                $('#Modal').modal('hide');
                dataTable.ajax.reload();
                }
            });
    });
    $(document).ready(function(){
    // Initiate DataTable function comes with plugin
    $('#dataTable').DataTable();
    // Start jQuery click function to view Bootstrap modal when view info button is clicked
    $('.get_data').click(function(){
    });
    });
    $(document).ready(function(){
    $.ajax({
        url: "<?php echo base_url() ?>invoice_controller/get_PoCode_in_invoice",
        method: "POST",
        success: function(data){
        // Print the fetched data of the selected phone in the section called #phone_result
        // within the Bootstrap modal
        $('#po_code').html(data);
        //$('#phoneModal').modal('show');
        }
    });
    // End AJAX function
    });
    function myfun(datavalue){
        $.ajax({
            url: "<?php echo base_url() ?>invoice_controller/get_PoCode_item",
            type:'POST',
            data:{datapost:datavalue},
            success:function(result){
            $('#po_return').html(result);
            }
        });
    }
    $('.adddata').click(function(){
        $('#largeModal').modal('show');
          $('.modal-title').html("<i class='fa fa-eye w3-text-blue'></i> <span class='w3-text-blue'>View Invoice Detail</span> ");
        $('#make_invoice')[0].reset();
    
    $(document).on('submit','#make_invoice',function(event){
        $('#submit').attr('disabled', 'disabled');
    event.preventDefault();
    var id=$('#id').val();
    var po_code=$('#po_code').val();
    var item_rate=$('#item_rate').val();
    var invoice_code=$('#invoice_code').val();
    var item_code=$('#item_code').val();
    var item_quantity=$('#item_quantity').val();
    var invoice_total=$('#invoice_total').val();
    var date=$('#date').val();
    var invoice_description=$('#invoice_description').val();
    $.ajax({
    url:"<?php echo base_url() ?>invoice_controller/make_invoice",
    method:"POST",
    // Last time set
    data:$('#make_invoice').serialize(),
    success:function(data)
    {
    alert(data);
    $('#submit').attr('disabled',false);
    $('#make_invoice')[0].reset();
    $('#largeModal').modal('hide');
    
    },
    });
    });
    
    });
    //** LOad MOdal View after Click on View Button***/
    $(document).ready(function(){
    $('.view').click(function(){
    var invoice_id = $(this).attr('id');
    $.ajax({
    url: "<?php echo base_url() ?>invoice_controller/view_invoice",
    method: "POST",
    data: {invoice_id:invoice_id},
    success: function(data)
    {
    $('#result').html(data);
    // Display the Bootstrap modal
    $('#Modal').modal('show');
    }
    });
    });
    });
    </script>
        <p id='fd' class='fd'>
        </p>
        <?php include_once "login/footer.php"; ?>