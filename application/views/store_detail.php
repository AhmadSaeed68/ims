<?php include "login/header.php"; ?>
<!-- Header -->


<div class=" w3-padding-64">
<!-- <div class='jumbotron'>
   <h1 class='w3-center'><span class='fa fa-wpforms w3-text-lime'> </span> Stock`s Detail</h1>
   
    </div> -->

<div class="panel-group">
   <a href="<?php echo base_url() ?>prd/pdf" class="w3-right" target="_blank"> <span class="fa fa-file-pdf-o w3-text-red fa-2x"></span> Download</a>
    <div class="panel panel-default">
    <div class="panel-heading w3-center w3-padding-24">

   <span class="fa fa-line-chart fa-2x w3-text-teal">
       Stock
   </span>

    </div>
    <div class="panel-body">
        <div class="w3-responsive">
    <table class="w3-table-all table-bordered w3-hoverable" id="order_data">
                <thead>
                    <tr class='w3-sand'>
                    <th>Id</th>
                    <th >Item Code</th>
                    <th>Item Qty</th>
                    <th>Item Rate</th>
                    <th>Store</th>

                    </tr>
                </thead>
                <tbody>
                  
                <?php foreach($data as $data):?>
                    <tr>
                    <td><?=$data['id']?></td>
                    <td><?=$data['item_code']?></td>
                    <td><?=$data['item_rate']?></td>
                    <td><?=$data['item_qty']?></td>
                    <td><?=$data['name']?></td>
                    </tr>
<?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <!-- jQuery DataTables JS CDN -->
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
    <!-- Bootstrap JS CDN -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
 
    <script>
    	  var orderdataTable = $('#order_data').DataTable({
    
            	
          });
    </script>