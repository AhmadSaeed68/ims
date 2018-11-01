<?php include_once "login/header.php"; ?>
<div class="container w3-padding-64">
  
  <div class="row ">
    <div class="row">
      <div class="panel panel-primary">
        <div class="panel-heading w3-center"><h4><b class="w3-wide">Sales Report</b></h4></div>
        <div class="panel-body">
          <div class="row">
            <div class="col-sm-6">
              <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  <b>Items Sales </b>
                  <span class="badge badge-primary badge-pill"><span id="item_sale"></span> </span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  <b>Total items QTY in Sale</b>
                  <span class="badge badge-primary badge-pill"><span id="item_qty"></span></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  <b>Total Sales Value</b>
                  <span class="badge badge-primary w3-teal badge-pill">PKR: <span id="total_sales"></span> =/</span>
                </li>
              </ul>
            </div>
            <div class="col-sm-6">
              
              <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  <b>No. of Customers</b>
                  <span class="badge badge-primary badge-pill"><span id="no_customers"></span></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  <b>Customers Total Purchasing</b>
                  <span class="badge badge-primary badge-pill w3-blue">PKR: <span id="customer_total_purchasing"></span> =/</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  <b>Estimated Profit Ratio</b>
                  <span class="badge badge-primary w3-green badge-pill">PKR: <span id="estimate_profit"></span> =/</span>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    
  </div>

  <div class="row w3-padding-24">
      <div class="
Panel with panel-success class">
        <div class="panel-heading w3-center"><h4><b class="w3-wide">Stock Report</b></h4></div>
        <div class="panel-body">
          <div class="row">
            <div class="col-sm-6">
              <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  <b>Item types  </b>
                  <span class="badge badge-primary badge-pill"><span id="item_types_stock"></span> </span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  <b>Total items QTY in Stock</b>
                  <span class="badge badge-primary badge-pill"><span id="total_item_qty_in_stock"></span></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  <b>Total Stock Value</b>
                  <span class="badge badge-primary w3-teal badge-pill">PKR: <span id="total_stock_value"></span> =/</span>
                </li>
              </ul>
            </div>
            <div class="col-sm-6">
              
              <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  <b>No. Days</b>
                  <span class="badge badge-primary badge-pill"><span id="no_days"></span></span>
                </li>
               
               
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
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
//Count All users
$.ajax({

url: "<?php echo base_url() ?>report/item_sale",
method: "POST",

success: function(data){

$('#item_sale').html(data);

}
});
//Count All Categoryes
$.ajax({

url: "<?php echo base_url() ?>report/item_qty",
method: "POST",

success: function(data){

$('#item_qty').html(data);

}
});
//Count ITems
$.ajax({

url: "<?php echo base_url() ?>report/total_sales",
method: "POST",

success: function(data){

$('#total_sales').html(data);

}
});
//count order
$.ajax({

url: "<?php echo base_url() ?>report/no_customers",
method: "POST",

success: function(data){

$('#no_customers').html(data);

}
});
//Order Value
$.ajax({

url: "<?php echo base_url() ?>report/customer_total_purchasing",
method: "POST",

success: function(data){

$('#customer_total_purchasing').html(data);

}
});
//Invoice Value
  $.ajax({

    url: "<?php echo base_url() ?>report/estimate_profit",
    method: "POST",

    success: function(data){

      $('#estimate_profit').html(data);

    }
  });

  //*****************************************************************************//
                      ///// STOCK REPORT///
  //****************************************************************************//

  //item_types_stock
  $.ajax({

    url: "<?php echo base_url() ?>report/item_types_stock",
    method: "POST",

    success: function(data){

      $('#item_types_stock').html(data);

    }
  });


   //total_item_qty_in_stock
  $.ajax({

    url: "<?php echo base_url() ?>report/total_item_qty_in_stock",
    method: "POST",

    success: function(data){

      $('#total_item_qty_in_stock').html(data);

    }
  });


   //total_stock_value
  $.ajax({

    url: "<?php echo base_url() ?>report/total_stock_value",
    method: "POST",

    success: function(data){

      $('#total_stock_value').html(data);

    }
  });


   //no_days
  $.ajax({

    url: "<?php echo base_url() ?>report/no_days",
    method: "POST",

    success: function(data){

      $('#no_days').html(data);

    }
  });




});
</script>
