<!DOCTYPE html>
<html lang="en">
<head>
 @include('header')
</head>
<body>
 @include('sidebar')   
    <div class="col-sm-9">
      <div class="well">
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        <h4>Issue Master</h4>
        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#addissue">Add Issue</button><br>
          <br>

         <div class="row">
            <div class="col-md-9">
            </div>
            <div class="col-md-3">
              <input id="myInput" type="text" placeholder="Search...." class="form-control">
            </div>
          </div>

          <br>
          <div style="overflow-x:auto; overflow-y: auto; height: 350px;">
          <table class="table table-bordered" id="viewissue">
            <thead>
              <tr>
                <th>Sr. No.</th>
                <th>Issue Name</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
              <?php $counter = 0; ?>
              @foreach($getissue as $val)
              <tr>
                <td><?php echo ++$counter; ?></td>
                <td>{{ $val->issue_name }}</td>
                <td><button type="button" class="btn btn-info issueedit" id="issueedit" value="{{ $val->issue_id }}" data-val="{{ $val->issue_name }}">Edit</button></td>
                <td><button type="button" value="{{ $val->issue_id }}" class="btn btn-danger del">Delete</button></td>
              </tr>
              @endforeach
            </tbody>
          </table>
          </div>

      </div>
    </div>
  </div>
</div>
@include('footer')
<script type="text/javascript">
    $("document").ready(function(){
      setTimeout(function(){
          $("div.alert").remove();
      }, 2000 ); // 5 secs
    });

    $(document).ready(function(){
      $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#viewissue tbody tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
   });

   $('.issueedit').click(function(){
      var issue_id = $(this).val();
      var issue_name = $(this).attr('data-val');
      $('#updateissue').modal('show');
      $('#issueid').val(issue_id);
      $('#eissuename').val(issue_name);
   });

   $('.del').click(function(){
      var deldata = confirm('Are you sure you want to delete this item?');
      if(deldata){
        var isseid = $(this).val();
        $.ajax({
           url:'del-issue/{isseid}',
           type:'get',
           data:{ isseid:isseid },
           success:function(delmsg){
             if(delmsg == 1){
                alert("Issue deleted successfully.");
                location.reload();
             }else{
                alert("Issue delete failed.");
                location.reload();
             }
           }
        })
      }
   });
</script>
</body>
</html>

<!-- Modal save issue-->
  <div class="modal fade" id="addissue" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Issue</h4>
        </div>
        <div class="modal-body">
          <form action="{{url('add-issue')}}" method="post">
            {{ csrf_field() }}
          <label>Add Issue</label>
          <input type="text" name="issuename" id="issuename" class="form-control" required="true">
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Submit</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Modal update issue-->
  <div class="modal fade" id="updateissue" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Update Issue</h4>
        </div>
        <div class="modal-body">
          <form action="{{url('edit-issue')}}" method="post">
            {{ csrf_field() }}
          <label>Change Issue</label>
          <input type="hidden" name="issueid" id="issueid" class="form-control">
          <input type="text" name="eissuename" id="eissuename" class="form-control" required="true">
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Update</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
    </div>
  </div>