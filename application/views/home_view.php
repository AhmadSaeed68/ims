
<?php $id=$this->session->userdata('user_id');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
  <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
  
</head>

<body>
  <div class="row">
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
                              <div class="row">
     <div class="input-daterange">
      <div class="w3-container">
         <p><label><i class="fa fa-calendar-check-o"></i> From</label></p>
       <input type="text" name="start_date" id="start_date" lass="w3-input w3-border">
      
       <p><label><i class="fa fa-calendar-check-o"></i> From</label></p>
       <input type="text" name="end_date" id="end_date" lass="w3-input w3-border">
      </div>      
     </div>
     <div class="col-md-4">
      <input type="button" name="search" id="search" value="Search" class="btn btn-info" />
     </div>
    </div>
                        </div>
                    </a>
                    
                    
                    
                    
                    
                </div>
                <a href="#" class="w3-bar-item w3-button"><i class="fa fa-paper-plane w3-margin-right"></i>Sent</a>
                <a href="#" class="w3-bar-item w3-button"><i class="fa fa-hourglass-end w3-margin-right"></i>Drafts</a>
                <a href="#" class="w3-bar-item w3-button"><i class="fa fa-trash w3-margin-right"></i>Trash</a>
            </nav>
    </div>
    <div class="col-sm-10">
      <div class="container box">
   <h1 align="center">Date Range Search in Datatables using PHP Ajax</h1>
   <br />
   <div class="table-responsive">
    <br />
   <!--  <div class="row">
     <div class="input-daterange">
      <div class="col-md-4">
       <input type="text" name="start_date" id="start_date" class="form-control" />
      </div>
      <div class="col-md-4">
       <input type="text" name="end_date" id="end_date" class="form-control" />
      </div>      
     </div>
     <div class="col-md-4">
      <input type="button" name="search" id="search" value="Search" class="btn btn-info" />
     </div>
    </div> -->
    <br />
   
    <table id="order_data" class="table table-bordered table-striped">
     <thead>
      <tr>
       <th>ID</th>
       <th>Invoice Code</th>
       <th>Item Code</th>
       <th>Item Qty</th>
       <th>Item Rate</th>
       <th>Item Total</th>
       <th>Date</th>
       <th>View</th>
       <th>Action</th>
      </tr>
     </thead>
     <?php echo "Hello World"?>;
    </table>
    
   </div>
  </div>
    </div>
  </div>
	
 </body>
</html>
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
     
        <!-- Bootstrap JS CDN -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

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
<script>
	
	$(document).ready(function(){
 
 $('.input-daterange').datepicker({
  todayBtn:'linked',
  format: "yyyy-mm-dd",
  autoclose: true
 });

fetch_data('no');
 function fetch_data(is_date_search, start_date='', end_date='')
 {
  var dataTable = $('#order_data').DataTable({
   "processing" : true,
   "serverSide" : true,
   "order" : [],
   "ajax" : {
   url:"<?php echo base_url() ?>home/ajax",
    type:"POST",
    data:{
     is_date_search:is_date_search, start_date:start_date, end_date:end_date
    }
   }
  });
 }


  $('#search').click(function(){
  var start_date = $('#start_date').val();
  var end_date = $('#end_date').val();
  if(start_date != '' && end_date !='')
  {
   $('#order_data').DataTable().destroy();
   fetch_data('yes', start_date, end_date);
  }
  else
  {
   alert("Both Date is Required");
  }
 });


     $(document).on('click', '.view', function(){
       var invoice_id = $(this).attr('id');
        $.ajax({
    url:"<?php echo base_url() ?>home/view_invoice",
    method: "POST",
    data: {invoice_id:invoice_id},
    success: function(data)
    {
    $('#result').html(data);
    // Display the Bootstrap modal
    $('#Modal').modal('show');
     orderdataTable.ajax.reload();
    }
    });
    });
   

});

    
</script>

<p id="result"></p>


