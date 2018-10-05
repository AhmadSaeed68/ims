
<?php include_once "login/header.php"; 


?>

<p class='w3-code w3-smoke'><?php echo "Today is " . date("Y/m/d") . "<br>";?></p>
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
<div class="container w3-border">
<div class='jumbotron'>
   <h1 class='w3-center'><span class=' 	fa fa-themeisle w3-text-gray'> </span> Invoice Detail</h1>
   
    </div>
<a href="#largeModal" class="btn btn-primary adddata w3-right"  data-toggle="modal">Make Invoice</a>
    <div class="w3-container">
            <h1 class='w3-center'>PO Invoice</h1>
        <div class="panel panel-default">
            <div class="panel-heading"><span class=''></span>
            <span class="w3-right">
          
            </span> <!-- Modal -->
              <!-- Large Modal HTML -->
    
            <div class="panel-body">
            <div class="w3-responsive">
            <table class="w3-table-all table-bordered w3-hoverable" id="order_data">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Po Code</th>
                        <th>Invoice Code</th>
                        
                        
                        <th>Invoice Total</th>
                        <th>Invoice Desc</th>
                        <th>Inv Date</th>
                        <th>View</th>
                        
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
                        <td><span class="fa fa-file-pdf-o w3-text-red"><a class="view" id="<?=$data['id']?>"> View</a></span></td>
                        <td> <div class="dropdown">
                                    <button class="btn w3-orange btn-default dropdown-toggle" type="button" data-toggle="dropdown">Action
                                    <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                    
                                    <li><input type="button" class="btn btn-sm w3-teal edit" value="Edit" id="<?php echo $data['id']; ?>"></li>
                                    <li><input type="button" class="btn btn-sm w3-red  delete" value="Delete" id="<?php echo $data['id']; ?>"></li>
                                    </ul>
                                </div>
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


<div id="largeModal" class="modal">
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
                           
                           <div class="col-sm-6 col-md-6">
                               <div class="form-row">
                    <div class="form-group col-md-4">
                    <label for="pwd">Po Code:</label>
                    <span id="po_code"  name="po_code" class="show_data po_code"></span>
                    </div>
                  
                    <div class="form-group col-md-4">
                     <label for="pwd">Invoice Code:</label>
                    <input type="text" class="form-control" name="invoice_code" id="invoice_code">
                    </div>
                    <div class="form-group col-md-4">
                    
                 <label for="email" class="w3-center">Invoice Description</label>
                <textarea rows="5" name="invoice_description" id="invoice_description" required="" cols="25"></textarea>
                    </div>
                </div>
               
                    <div class="form-row" id='po_return'>
                    
                           </div>
                           <div class="col-sm-6 col-md-6">
                               <button type="button" name="add" id="add" class="btn btn-success">Add More</button>
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
                    
                    url: "<?php echo base_url() ?>prd/get_PoCode_in_invoice",
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
        url: "<?php echo base_url() ?>prd/get_PoCode_item",
      type:'POST',
      data:{datapost:datavalue},
      success:function(result){
        $('#po_return').html(result);
      }
    });
  }
  $(document).on('submit','#make_invoice',function(event){
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
                url:"<?php echo base_url() ?>prd/make_invoice", 
                method:"POST",
                // Last time set  
                data:$('#make_invoice').serialize(),
                success:function(data)  
                {  
                    alert(data);
                    var dataTable=$("#order_data").dataTable();

                    $('#make_invoice')[0].reset();
                    dataTable.ajax.reload();
                    $('#largeModal').modal('hide');


                },

        });

            
            });



            //** LOad MOdal View after Click on View Button***/
            $(document).ready(function(){
            $('.view').click(function(){
        var invoice_id = $(this).attr('id');
        $.ajax({
                            url: "<?php echo base_url() ?>prd/view_invoice",
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