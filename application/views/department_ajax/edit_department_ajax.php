<?php foreach($records as $data):?><?php  endforeach;
$output = ''; ?>
<form id="update_form">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="form-group">
                                <label>Department</label>
                                <input type="hidden"  value="<?=$data['id']?>" name="id" id="id">
                                <input class="form-control" required placeholder="Enter Department" value="<?=$data['department']?>" name="department" id="department">
                            </div>
                        </div>
                       
                    </div>
                    
                    
                    
                </div>
                
                <!-- Modal footer -->
                <div class="modal-footer">
                    <input type="submit" class="btn btn-success" name="update" id="update" value="Update">
                    </form>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                
</div>
</form>