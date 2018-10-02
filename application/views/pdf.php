<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<table class="table table-condensed">
    <thead>
      <tr>
        <th>ID</th>
        <th>Item Name</th>
        
      </tr>
    </thead>
    <tbody>
      <tr>
      <?php foreach($pdf as $pdf):?>
        <td><?= $pdf['id']?></td>
        <td><?= $pdf['item_name']?></td>
        
      </tr>
      <?php endforeach;?>
     
    </tbody>
  </table>