



  <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  </head>
  <body>
      
<div class="container">
<div class='jumbotron'>
   <h1 class='w3-center'><span class='fa  w3-text-lime'> </span> PO Order Detail</h1>

    </div>

<div class="panel-group" style="background-color: lightblue;">
   
    <div class="panel panel-default">
   
    <div class="panel-body">
    <table class="table" style="outline-color: red; font-size: 30px; padding: 32px;">
                <thead>
                    <tr class='w3-sand' style=" height: 500px;">
                    <th>Id</th>
                    <th>PO Code</th>
                    <th>Item Code</th>
                    <th>Desc</th>
                    <th>Qty</th>
                    <th>Rate</th>
                    <th>Total</th>
                    <th>Report</th>
                    <th>Date</th>
                    
                   

                    </tr>
                </thead>
                <tbody>
                <?php foreach($pdf as $data):?>
                    <tr>
                    <td><?= $data['id'];?></td>
                    <td><?=$data['po_code'];?></td>
                    <td><?=$data['item_code'];?></td>
                    <td><?=$data['po_description'];?></td>
                    <td><?=$data['item_qty'];?></td>
                    <td><?=$data['item_rate'];?></td>
                    <td><?=$data['po_item_total'];?></td>
                    <td><?=$data['order_report'];?></td>
                    <td><?=$data['po_date'];?></td>
                    
                    </tr>
<?php endforeach;?>
                </tbody>
            </table>
    </div>
    </div></div></div>
  </body>
  </html>