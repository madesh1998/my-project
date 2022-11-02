    <div class="content-wrapper">
<section class="content-header">
  <h1><?php echo $labels[0];?></h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i><?php echo $labels[1];?></a></li>
    <li class="active"><?php echo $labels[0];?></li>
  </ol> 
</section>
<section class="content">
<div class="row">
<div class="col-xs-12">
  <div class="box">
    <div class="box-body"> 
        <div class="row">
            <div class="col-md-6">
                <form method="POST" action="<?= base_url() ?>masters/Currencycontrol/save_currrency">
                <div class="form-group col-md-10">
                        <label for="currrency"><?php echo $labels[2];?> :</label>
                        <input type="text" class="form-control" name="currency" id="currency" value="" placeholder="Currency">
                    </div>
                    <!-- <div class="form-group col-md-10">
                        <label for="pagedescription">Page Description :</label>
                        <textarea class="form-control" name="pagedesct" id="pagedesct" value="" placeholder="Page Description"></textarea>
                    </div> -->
                    <input type="hidden" name="rowid" value="" id="rowid">
                    <button type="submit" class="btn btn-success" name="submit" value="submit" style="margin-left:45%;">Save</button>
                </form><br>
                <div>
                    <table class="table table-bordered" id="myTable">
                        <thead>
                            <tr>
                                <th class="text-center"><?php echo $labels[3];?></th>
                                <th class="text-center"><?php echo $labels[2];?></th>
                                <th class="text-center"><?php echo $labels[4];?></th>
                            </tr>
                        </thead>
                        <?php $cnt = 1; ?> 
                        <?php
                foreach (@$currency->result() as $row)
                {   
                ?>       
                <tr class="text-center">  
                    <td><?php echo $cnt; $cnt++;?></td>  
                    <td class="hidden"><?php echo $row->row_id;?></td>
                    <td><?php echo $row->currency;?></td>
                    <td><a href="#"><button type="button" class="edit">EDIT</button> <button type="button" class="delete_btn">Delete</button></a></td>
                    
                </tr>  
                <?php 
                }  
                ?>  
                    </table>
                </div>
            </div>
        </div>
    </div> 
</div>
</div>
</div>
</section>
</div>
    <script type="text/javascript">
    $(document).ready(function(){
 
        $("#myTable").on('click','.edit',function(){
            var currentRow=$(this).closest("tr"); 
            $("#rowid").val(currentRow.find("td:eq(1)").html());
            $("#currency").val(col2=currentRow.find("td:eq(2)").html());               
            return false;
        });

        $("#myTable").on('click','.delete_btn',function(){
                var currentRow=$(this).closest("tr"); 
                var id =$(this).parents("tr").find("td:eq(1)").html();
                // alert("Deleted");
                if(confirm('Are you sure to remove this record ?'))
                $.ajax({
                    url : "<?php echo base_url();?>masters/Currencycontrol/delete",
                    method : "POST",
                    data : {id:id},
                    success: function(response)
                        {
                        alert("Deleted successfully");
                        location.reload();                        
                        }
            });
            return false;
        });
    })

    </script>
