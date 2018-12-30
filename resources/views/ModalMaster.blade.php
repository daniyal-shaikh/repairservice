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
        <h4>Modal Master</h4>
        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#addmodal">Add Modal</button><br>
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
          <table class="table table-bordered" id="viewmodel">
            <thead>
              <tr>
                <th>Sr. No.</th>
                <th>Company Name</th>
                <th>Modal Name</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
              <?php $counter = 0; ?>
              @foreach($getmodal as $val)
              <tr>
                <td><?php echo ++$counter; ?></td>
                <td>{{ $val->company_name }}</td>
                <td>{{ $val->modal_name }}</td>
                <td><button type="button" class="btn btn-info updatemodel" id="updatemodel" value="{{ $val->model_id }}">Edit</button></td>
                <td><button type="button" value="{{ $val->model_id }}" class="btn btn-danger del">Delete</button></td>
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
</body>
</html>


<!-- Modal save modal-->
  <div class="modal fade" id="addmodal" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Modal</h4>
        </div>
        <div class="modal-body">
          <form action="{{url('add-modal')}}" method="post">
            {{ csrf_field() }}
          <label>Select Company</label>
          <select type="text" name="comid" id="comid" class="form-control" required="true">
          	<option selected disabled="" value="">----Select----</option>
          	@foreach($getcompany as $val)
          		<option value="{{ $val->company_id }}">{{ $val->company_name }}</option>
          	@endforeach
          </select>
          <br>
          <label>Add Model</label>
          <input type="text" name="modalname" id="modalname" class="form-control" required="true">
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Submit</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Modal update company-->
  <div class="modal fade" id="updatemodelview" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Update Model</h4>
        </div>
        <div class="modal-body">
          <form action="{{url('edit-save-model')}}" method="post">
            {{ csrf_field() }}
          <label>Change Company</label>
          <input type="hidden" name="modelid" id="modelid" class="form-control">
          <select type="text" name="ecomid" id="ecomid" class="form-control" required="true">
          	@foreach($getcompany as $val)
          		<option value="{{ $val->company_id }}">{{ $val->company_name }}</option>
          	@endforeach
          </select>
          <br>
          <label>Change Model</label>
          <input type="text" name="modelname" id="modelname" class="form-control" required="true">
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Update</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
    </div>
  </div>

  <script type="text/javascript">
    $("document").ready(function(){
      setTimeout(function(){
          $("div.alert").remove();
      }, 2000 ); // 5 secs

    });

    $(document).ready(function(){
      $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#viewmodel tbody tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
   });

    $('.updatemodel').click(function(){
      var model_id = $(this).val();
        $.ajax({
           url:'edit-model/{model_id}',
           type:'get',
           data:{ model_id:model_id },
           success:function(editmsg){
           		$('#updatemodelview').modal('show');
           		$('#modelid').val(editmsg[0].model_id);
			    $('#ecomid').append( '<option value="'+ editmsg[0].company_id +'" selected>'+editmsg[0].company_name+'</option>' );
      			$('#modelname').val(editmsg[0].modal_name);
           }
        })
   });

    $('.del').click(function(){
      var deldata = confirm('Are you sure you want to delete this item?');
      if(deldata){
        var mid = $(this).val();
        $.ajax({
           url:'del-model/{mid}',
           type:'get',
           data:{ mid:mid },
           success:function(delmsg){
             if(delmsg == 1){
                alert("Model deleted successfully.");
                location.reload();
             }else{
                alert("Model delete failed.");
                location.reload();
             }
           }
        })
      }
   });

  </script>