<?php
require 'dashboard_part/header.php';
require 'db_connect.php';

$all_read_messages = "SELECT * FROM messages WHERE status=1 AND delete_status=0 ORDER BY id DESC";
$read_messages_reslt = mysqli_query($db_connect, $all_read_messages);
//$after_assoc_msg = mysqli_fetch_assoc($read_messages_reslt);
$unread_msg = "SELECT * FROM messages WHERE status=0 AND delete_status=0 ORDER BY id DESC";
$unread_msg_reslt = mysqli_query($db_connect, $unread_msg);

?>

<div class="content-wrapper">
  <div class="row">
    <div class="col m-auto py-3 my-2">
      <div class="card bg-light mb-3">
        <div class="card-header text-center">
          <h3 class="bg_header py-3">All Messages' information here!</h3>
            <!-- success messege after update successfully completed!   -->
            <?php if(isset($_SESSION['update_success'])){ ?>
              <h3 class="text-center text-success py-3">
              <div class="alert alert-success" role="alert">
                <?php
                  echo $_SESSION['update_success'];
                  unset($_SESSION['update_success']);
                ?>
              </div>
            <?php } ?>
            <!-- success messege after delete selected data   -->
            <?php if(isset($_SESSION['success_del'])){ ?>
              <div class="alert alert-success" role="alert">
                <?php
                  echo $_SESSION['success_del'];
                  unset($_SESSION['success_del']);
                ?>
              </div>
            </h3>
            <?php } ?>
        </div> <!-- card header end   -->
        <div class="card-body">
          <form id="msg_form" class="" action="multiple_msg_delete.php" method="post">
            <table class="table table-striped table-responsive card-text">
              <thead>
                <tr>
                  <th><input type="submit" class="btn btn-danger" name="btn_delete" value="Delete" onclick="return deleteConfirm();"/></th>
                  <th><input type="submit" class="btn btn-primary" name="btn_read" value="Mark as Read" onclick="return readConfirm();" /></th>
                </tr>
                <tr>
                  <th scope="col"><input type="checkbox" name="check_all" id="check_all" value=""/> <label for="check_all">Select All</label> </th>
                  <th scope="col">Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Messages</th>
                  <th scope="col">Send Time</th>
                  <th class="text-center" scope="col" colspan="3">Action</th>
                </tr>
              </thead>
            <tbody>
              <?php
                foreach($unread_msg_reslt as $ind_rslt) { ?>
              <tr class="<?=($ind_rslt['status']==0) ? 'bg-info' : '' ?>">
                <th scope="row"><input class="checkbox" type="checkbox" name="selectedId[]" value="<?php echo $ind_rslt['id']; ?>"></th>
                <td><?php echo $ind_rslt['name']; ?></td>
                <td><?php echo $ind_rslt['email']; ?></td>
                <td><?php echo $ind_rslt['message']; ?></td>
                <td><?php $time = $ind_rslt['send_time'];  echo timeago($time); ?> </td>
                <td><a href="single_message_info.php?id=<?php echo $ind_rslt['id'];?>" class="btn btn-primary">View</a></td>
                <td>
                <!-- Button trigger modal -->
                <?php if ($_SESSION['log_role']==1): ?>
                  <a href="delete_message.php?id=<?php echo $ind_rslt['id'];?>" data-toggle="modal" data-target="#exampleModal_<?php echo $ind_rslt['id'];?>" class="btn btn-danger text-white">Delete</a>
                <?php endif; ?>
                  <!-- Modal -->
                  <div class="modal fade" id="exampleModal_<?php echo $ind_rslt['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Are you sure you wanna delete the message?</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-dark" data-dismiss="modal">No</button>
                          <a class="btn btn-danger"href="delete_message.php?id=messages-<?php echo $ind_rslt['id'];?>">Yes</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </td>
              </tr>
              <?php } ?>
              <?php
                foreach($read_messages_reslt as $ind_rslt) { ?>
              <tr class="<?=($ind_rslt['status']==0) ? 'bg-info' : '' ?>">
                <th scope="row"><input class="checkbox" type="checkbox" name="selectedId[]" value="<?php echo $ind_rslt['id']; ?>"></th>
                <td><?php echo $ind_rslt['name']; ?></td>
                <td><?php echo $ind_rslt['email']; ?></td>
                <td><?php echo $ind_rslt['message']; ?></td>
                <td><?php $time = $ind_rslt['send_time'];  echo timeago($time); ?> </td>
                <td><a href="single_message_info.php?id=<?php echo $ind_rslt['id'];?>" class="btn btn-primary">View</a></td>
                <td>
                <!-- Button trigger modal -->
                <?php if ($_SESSION['log_role']==1): ?>
                  <a href="delete_message.php?id=<?php echo $ind_rslt['id'];?>" data-toggle="modal" data-target="#exampleModal_<?php echo $ind_rslt['id'];?>" class="btn btn-danger text-white">Delete</a>
                <?php endif; ?>
                  <!-- Modal -->
                  <div class="modal fade" id="exampleModal_<?php echo $ind_rslt['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Are you sure you wanna delete the message?</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-dark" data-dismiss="modal">No</button>
                          <a class="btn btn-danger"href="delete_message.php?id=messages-<?php echo $ind_rslt['id'];?>">Yes</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </td>
              </tr>
              <?php } ?>
            </tbody>
            </table>
          </form>
      </div> <!-- card body end  -->
      </div>
    </div>
  </div> <!-- row end  -->

  <!-- get the dashboard footer  -->
  <?php require 'dashboard_part/footer.php'; ?>

  <script type="text/javascript">
  function deleteConfirm(){
    document.getElementById("msg_form").setAttribute("action", "multiple_msg_delete.php");
    var result = confirm("Do you really want to delete the selected records?");
    if(result){
      return true;
    }else{
      return false;
    }
  }
  function readConfirm(){
    var result1 = confirm("Do you really want to mark as read the selected records?");
    if(result1){
      document.getElementById("msg_form").setAttribute("action", "multiple_msg_read.php");
      return true;
    }else{
      return false;
    }
  }
  $(document).ready(function(){
    $('#check_all').on('click',function(){
      if(this.checked){
        $('.checkbox').each(function(){
          this.checked = true;
        });
      }else{
        $('.checkbox').each(function(){
          this.checked = false;
        });
      }
    });

    $('.checkbox').on('click',function(){
      if($('.checkbox:checked').length == $('.checkbox').length){
        $('#check_all').prop('checked',true);
      }else{
        $('#check_all').prop('checked',false);
      }
    });
  });
</script>
