<?php include_once "login/header.php";?>
    <!-- /.row -->

    <div class="row ">
 
    <div class="col-lg-12">
    
        <div class="panel panel-default">
            <div class="panel-heading">
               Comming Purchase Rrquests
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover table-responsive" id="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            
                            <th>Dept.</th>
                            <th>Item Name</th>
                            <th>Qty</th>
                            <th>reviews</th>
                            
                            <th>Actions</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                   
        <?php $i=0; foreach($data as $data):$i++;?>
                  
                         <tr class="odd gradeX">
                         <form id="dynamic_field">
                         <td><?=$i;?></td>
                            <td>
                            <?=$data->department_name?>
                            <input type="hidden" readonly value="<?=$data->department_name ?>"  name="department_name" id="department_name">
                            <input type="hidden" readonly value="<?=$data->id ?>"  name="id" id="id">
                            </td>
                            <td>
                            <?=$data->item_code?>
                            
                            <input type="hidden" readonly value="<?=$data->item_code?>" class="item_code"  name="item_code" id="item_code">
                            </td>
                            <td>
                            <input type="number"  value="<?=$data->item_qty?>"  name="item_qty" id="item_qty">
                            <p class="w3-text-red">Avail Qty: <span id="<?=$data->item_code?>"><?php 
                            // var_dump($data1);
                            // $print_warn = 0;
                            // foreach($data1 as $da){
                            //     if($print_warn == 0)
                            //     if($da['item_code'] == $data->item_code){
                            //         echo $da['item_qty'];
                            //     } else {
                            //         echo "Qty not Avail";
                            //     }

                            //     $print_warn = 1;
                            // }
                            //   
                            foreach($data1 as $da)
                            {}
                                if($data->item_code==$da['item_code'])
                                {
                                    echo $da['item_qty'];
                                }
                                else
                                {
                                    echo "Not";
                                }
                            

                            ?></span>
                                <?php
                                // foreach($data1 as $dat)
                                // {
                                //     echo $dat['item_qty'];
                                // }
                                ?>
                            </p>
                            </td>
                            <td>
                            <textarea required  value="test" name="review" id="review"><?= $data->review?></textarea> 
                           
                            </td>
                            
                            <td>
                            
                            <div class="w3-dropdown-hover">
                                <button class="w3-button w3-black">Actions</button>
                                    <div class="w3-dropdown-content w3-bar-block w3-border">
                                    <button type="submit" name="submit" id="submit" class="btn btn-info btn-circle btn-lg"><i class="fa fa-check"></i>
                            </button>
                            <button type="button" name="submit" id="<?= $data->id;?>"  class="btn w3-red btn-circle delete btn-lg"><i class="fa fa-times"></i>
                            </button>
                                   
                                    </div>
                            </div>
                            
                            </td>
                            </form>
                        </tr>
                       <script>
                       var item_code = <?=json_encode($data->item_code);?>;
                       $.ajax({
                    url:"<?php echo base_url() ?>purchase_request_controller/item_from_stock",
                    method:"POST",
                    data:{item_code:item_code},
                    success:function(data)
                    {
                    
                     console.log(data);
                }
                });
                       
                       </script>
        <?php endforeach;?>
                    </tbody>
                </table>
                <!-- /.table-responsive -->
                
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    
    <!-- /.col-lg-12 -->
</div>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<!-- Bootstrap JS CDN -->
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
<!-- Bootstrap JS CDN -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<link href="<?php echo base_url(); ?>assets/vendor/select2.min.css" rel="stylesheet">
<script src="<?php echo base_url(); ?>assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/datatables-responsive/dataTables.responsive.js"></script>
      <!-- jQuery -->
      <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
      <script src="<?php echo base_url(); ?>assets/vendorselect2.min.js"></script>


<script type="text/javascript">
var table;
$(document).ready(function(){
    //datatable
    table = $('#table').DataTable({
       
        });

            $(document).on('submit','#dynamic_field', function(event){
                event.preventDefault();
               
                var form_data = $(this).serialize();
                $.ajax({
                            url:"<?php echo base_url() ?>purchase_request_controller/action_on_request",
                            method:"POST",
                            data:form_data,
                            success:function(data){
                               
                              table.ajax.reload();
                              swal({
                                    title: "Items assign to Dept",
                                    text: "Thanks to response",
                                    icon: "success",
                                    });
                            }
                        });
                
                });
                $(document).on('click', '.delete', function(){
                    var id = $(this).attr("id");
                                            swal({
                        title: "Items not Avail in Stock. Are You Sure to send req in Stock Shortage?",
                        text: "After This you will make Purchase ORDER Manually",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                        })
                        .then((willDelete) => {
                        if (willDelete) {
                            
                           
                            
                            $.ajax({
                    url:"<?php echo base_url() ?>purchase_request_controller/delete_request",
                    method:"POST",
                    data:{id:id},
                    success:function(data)
                    {
                        window.location = "<?php echo base_url() ?>purchase_request_controller/request_action";
                    
                }
                })
                            swal("Poof! Your imaginary file has been deleted!", {
                            icon: "success",
                            });
                        } else {
                            swal("Your imaginary file is safe!");
                        }
                        });
            
        
                  
          
           
         });


var item_code = $('.item_code');
var item_code_value = [];
   $(item_code).each(function(){
    item_code_value.push($(this).val());
   });
   $.ajax({
    url:"<?php echo base_url() ?>purchase_request_controller/item_code_value",
    method:"POST",
//    dataType:"json"
    data:{item_code_value:item_code_value},
   
    success:function(data)
    {
     //   console.log(data);
        //console.log("1");
             $.each(data,function(index, value){
               //  console.log('My array has at position ' + index + ', this value: ' + value);
             });
    }
   })     

    });
</script>
<?php include_once "login/footer.php";?>