<?php include_once "login/header.php"; ?>
<div class="container w3-padding-64">
  
  <div class="row ">

    <!-- Report -->
    <div class="row">
      <div class="panel panel-warning">
        <div class="panel-heading w3-center"><h4><b class="w3-wide"><span class="fa fa-paste fa-2x w3-text-red"></span> Final Report</b></h4></div>
        <div class="panel-body">
          <div class="row">
            <ul class="list-group">
            <div class="col-sm-6">
              <li class="list-group-item d-flex w3-light-green justify-content-between align-items-center">
                  <b>Recived PO Invoices</b>
                  <span class="badge badge-primary badge-pill"><span id="total_recived_invoices"></span></span>
                </li>
                <li class="list-group-item d-flex w3-lime justify-content-between align-items-center">
                  <b>Pending PO_invoices</b>
                  <span class="badge badge-primary  badge-pill"><span id="total_pending_invoices"></span></span>
                </li>
            </div>
            <div class="col-sm-6">
              <li class="list-group-item d-flex w3-amber justify-content-between align-items-center">
                  <b>Total Category You Deals</b>
                  <span class="badge badge-primary badge-pill"><span id="total_category_you_deal"></span></span>
                </li>
                <li class="list-group-item d-flex w3-khaki justify-content-between align-items-center">
                  <b>Total Items You Deals</b>
                  <span class="badge badge-primary  badge-pill"><span id="total_items_you_deal"></span></span>
                </li>
            </div>
            
                 
               </ul>
          </div>
          <br>
          <br>
          <div class="row">
            <div class="col-sm-6">
              <ul class="list-group">
             
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  <b>Total Purchase Items</b>
                  <span class="badge badge-primary badge-pill"><span id="total_purchase_items"></span> </span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  <b>Total Sale items</b>
                  <span class="badge badge-primary badge-pill"><span id="total_sale_items"></span></span>
                </li>
                <li class="list-group-item d-flex w3-light-blue justify-content-between align-items-center">
                  <b>Total Items Remaning</b>
                  <span class="badge badge-primary w3-green badge-pill"><span id="total_item_remain"></span></span>
                </li>
                
              </ul>
            </div>
            <div class="col-sm-6">
              
              <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  <b>Total Purchase Value</b>
                  <span class="badge badge-primary badge-pill w3-sand">PKR <span id="total_purchase_value"></span> =/</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  <b>Total Sales Value</b>
                  <span class="badge badge-primary badge-pill w3-blue">PKR: <span id="total_sale_value"></span> =/</span>
                </li>
                <li class="list-group-item w3-light-blue d-flex justify-content-between align-items-center">
                  <b> Total Estimate Profit</b>
                  <span class="badge badge-primary w3-green badge-pill">PKR: <span id="total_estimate_profit"></span> =/</span>
                </li>

              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

  
  <div class="w3-center">
    
    <button onclick="myFunction('Demo1')" class="w3-button  w3-black w3-left-align"><span class="   fa fa-list-alt w3-text-red"></span> Detail</button>
    <div id="Demo1" class="w3-hide w3-animate-zoom">
      <div class="container">
        <!-- SALES REPORT -->
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
                  <b>Total Sales items</b>
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
  <!-- STOCK_REPORT -->
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
  <!-- PURCHASE ORDER REPORT -->
  <div class="row w3-padding-24">
    <div class="
      Panel panel-danger">
      <div class="panel-heading w3-center"><h4><b class="w3-wide">Purchase Order Report</b></h4></div>
      <div class="panel-body">
        <div class="row">
          <div class="col-sm-6">
            <ul class="list-group">
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <b>Purchase Item types  </b>
                <span class="badge badge-primary badge-pill"><span id="po_item_types"></span> </span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <b>Total PO QTY</b>
                <span class="badge badge-primary badge-pill"><span id="total_po_qty"></span></span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <b>Total PO Value</b>
                <span class="badge badge-primary w3-teal badge-pill">PKR: <span id="total_po_value"></span> =/</span>
              </li>
            </ul>
          </div>
          <div class="col-sm-6">
            
            <ul class="list-group">
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <b>Recived PO.</b>
                <span class="badge badge-primary badge-pill"><span id="recived_po"></span></span>
              </li>
              
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <b>Pendings PO.</b>
                <span class="badge badge-primary badge-pill"><span id="pending_po"></span></span>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
    <!-- PURCHASE ORDER REPORT -->
        <div class="row w3-padding-24">
          <div class="
            Panel panel-info w3-show">
            <div class="panel-heading w3-center"><h4><b class="w3-wide">PO INVOICES Report</b></h4></div>
            <div class="panel-body">
              <div class="row">
                <div class="col-sm-6">
                  <ul class="list-group">
                    
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      <b>Total Invoice QTY</b>
                      <span class="badge badge-primary badge-pill"><span id="total_invoice_qty"></span></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      <b>Total Value of Invoice</b>
                      <span class="badge badge-primary w3-teal badge-pill">PKR: <span id="total_invoice_value"></span> =/</span>
                    </li>
                  </ul>
                </div>
                <div class="col-sm-6">
                  
                  <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      <b>Recived Invoices.</b>
                      <span class="badge badge-primary badge-pill"><span id="recived_invoices"></span></span>
                    </li>
                    
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      <b>Pendings Invoices.</b>
                      <span class="badge badge-primary badge-pill"><span id="pending_invoices"></span></span>
                    </li>
                  </ul>
                </div>
                
              </div>
            </div>
          </div>
        </div>
       
      </div>
    </div>
  </div>
  <script>
  function myFunction(id) {
  var x = document.getElementById(id);
  if (x.className.indexOf("w3-show") == -1) {
  x.className += " w3-show";
  } else {
  x.className = x.className.replace(" w3-show", "");
  }
  }
  </script>
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


//total_purchase_items
  $.ajax({

    url: "<?php echo base_url() ?>report/total_po_qty",
    method: "POST",

    success: function(data){

      $('#total_purchase_items').html(data);

    }
  });

  //total_item_remain
  $.ajax({

    url: "<?php echo base_url() ?>report/total_item_qty_in_stock",
    method: "POST",

    success: function(data){

      $('#total_item_remain').html(data);

    }
  });



//item_sale
$.ajax({

url: "<?php echo base_url() ?>report/item_sale",
method: "POST",

success: function(data){

$('#item_sale').html(data);

}
});
//item_qty
$.ajax({

url: "<?php echo base_url() ?>report/item_qty",
method: "POST",

success: function(data){

$('#item_qty').html(data);

}
});
//Total Sales
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
//customer_total_purchasing
$.ajax({

url: "<?php echo base_url() ?>report/customer_total_purchasing",
method: "POST",

success: function(data){

$('#customer_total_purchasing').html(data);

}
});
//Estimate Profit
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

  // *********************************************************************//
                  // Purchase Order REPORT//
  //*********************************************************************//

//po_item_types
  $.ajax({

    url: "<?php echo base_url() ?>report/po_item_types",
    method: "POST",

    success: function(data){

      $('#po_item_types').html(data);

    }
  });


  //total_po_qty
  $.ajax({

    url: "<?php echo base_url() ?>report/total_po_qty",
    method: "POST",

    success: function(data){

      $('#total_po_qty').html(data);

    }
  });

  //total_po_value
  $.ajax({

    url: "<?php echo base_url() ?>report/total_po_value",
    method: "POST",

    success: function(data){

      $('#total_po_value').html(data);

    }
  });

  //recived_po
  $.ajax({

    url: "<?php echo base_url() ?>report/recived_po",
    method: "POST",

    success: function(data){

      $('#recived_po').html(data);

    }
  });

  //pending_po
  $.ajax({

    url: "<?php echo base_url() ?>report/pending_po",
    method: "POST",

    success: function(data){

      $('#pending_po').html(data);

    }
  });

// *********************************************************************//
                  // PO Invoice REPORT//
  //*********************************************************************//


//total_invoice_qty
  $.ajax({

    url: "<?php echo base_url() ?>report/total_invoice_qty",
    method: "POST",

    success: function(data){

      $('#total_invoice_qty').html(data);

    }
  });


  //total_invoice_value
  $.ajax({

    url: "<?php echo base_url() ?>report/total_invoice_value",
    method: "POST",

    success: function(data){

      $('#total_invoice_value').html(data);

    }
  });


// *********************************************************************//
                  // Final REPORT//
  //*********************************************************************//


  //recived_invoices
  $.ajax({

    url: "<?php echo base_url() ?>report/recived_invoices",
    method: "POST",

    success: function(data){

      $('#recived_invoices').html(data);

    }
  });

  //pending_invoices
  $.ajax({

    url: "<?php echo base_url() ?>report/pending_invoices",
    method: "POST",

    success: function(data){

      $('#pending_invoices').html(data);

    }
  });



  //total_sale_items
$.ajax({

url: "<?php echo base_url() ?>report/item_qty",
method: "POST",

success: function(data){

$('#total_sale_items').html(data);

}
});

//total_purchase_value
  $.ajax({

    url: "<?php echo base_url() ?>report/total_invoice_value",
    method: "POST",

    success: function(data){

      $('#total_purchase_value').html(data);

    }
  });

   //total_sale_value
  $.ajax({

    url: "<?php echo base_url() ?>report/total_sales",
    method: "POST",

    success: function(data){

      $('#total_sale_value').html(data);

    }
  });

  //Estimate Profit
  $.ajax({

    url: "<?php echo base_url() ?>report/estimate_profit",
    method: "POST",

    success: function(data){

      $('#total_estimate_profit').html(data);

    }
  });

   //recived_invoices
  $.ajax({

    url: "<?php echo base_url() ?>report/recived_invoices",
    method: "POST",

    success: function(data){

      $('#total_recived_invoices').html(data);

    }
  });

    //pending_invoices
  $.ajax({

    url: "<?php echo base_url() ?>report/pending_invoices",
    method: "POST",

    success: function(data){

      $('#total_pending_invoices').html(data);

    }
  });

  //total_category_you_deal
  $.ajax({

    url: "<?php echo base_url() ?>report/total_category_you_deal",
    method: "POST",

    success: function(data){

      $('#total_category_you_deal').html(data);

    }
  });

   //total_items_you_deal
  $.ajax({

    url: "<?php echo base_url() ?>report/total_items_you_deal",
    method: "POST",

    success: function(data){

      $('#total_items_you_deal').html(data);

    }
  });

  




});
</script>
<?php include_once "login/footer.php"; ?>