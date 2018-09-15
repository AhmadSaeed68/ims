<?php
print_r($po_invoice);
?>
<?php include_once "login/header.php";  ?>
<style type="text/css">
    .bs-example{
      margin: 20px;
    }
  
    @media screen and (min-width: 992px) {
        .modal-lg {
          width: 1200px; /* New width for large modal */
        }
    }
</style>
<div class="container">
    
    <div class="w3-container">
            <h1>PO Invoice</h1>
        <div class="panel panel-default">
            <div class="panel-heading">Order Managment
            <span class="w3-right">
            <a href="#largeModal" class="btn btn-primary" data-toggle="modal">Make Purchase order</a>
            </span> <!-- Modal -->
              <!-- Large Modal HTML -->
  
            <div class="panel-body">
            <div class="w3-responsive">
            <table class="w3-table-all table-bordered" id="order_data">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Po Code</th>
                        <th>Invoice Code</th>
                        <th>Item Code</th>
                        <th>Item Qty</th>
                        <th>Item Rate</th>
                        
                        <th>Invoice Total</th>
                        <th>Invoice Desc</th>
                        <th>Inv Date</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($po_invoice as $data):?>
                    <tr>
                        <td><?= $data['id'];?></td>
                        <td><?= $data['po_code']?></td>
                        <td><?= $data['invoice_code']?></td>
                        <td><?= $data['item_code']?></td>
                        <td><?= $data['item_qty']?></td>
                        <td><?= $data['item_rate']?></td>
                        <td><?= $data['invoice_total']?></td>
                        <td><?= $data['invoice_description']?></td>
                        <td><?= $data['invoice_date']?></td>
                       
                        <td><input type="button" class="btn btn-info btn-sm edit" value="Edit" id="<?php echo $data['id']; ?>"></td>
                        <td><input type="button" class="btn btn-danger btn-sm delete" value="Delete" id="<?php echo $data['id']; ?>"></td>
                    
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

         <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true" style="margin-top: -20px;">
    <div class="modal-dialog ">
        <div class="modal-content">
        <div class="modal-header ">User Detail
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

            <!-- 
                
                *************************************************
                MODAL DATA AFTER GETTING DATA FROMM EDIT FUNCTION
                **************************************************
            
            
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
/********GET ID FROM INVOICE ID */
$(document).ready(function(){
    $('#dataTable').DataTable();
    $('.edit').click(function(){
        var invoice_id = $(this).attr('id');
        $.ajax({
                            url: "<?php echo base_url() ?>prd/edit_invoice",
                            method: "POST",
                            data: {invoice_id:invoice_id},
                            success: function(data)
                            {
                        // Print the fetched data of the selected order in the modal
                        // within the Bootstrap modal
                            $('#result').html(data);
                            // Display the Bootstrap modal
                            $('#Modal').modal('show');
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
                url: "<?php echo base_url() ?>prd/update_invoice",
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
                    $("#order_data").dataTable().ajax.reload();
                    
                }
            });

  
  
             });

             
</script>
<p id='fd' class='fd'></p>