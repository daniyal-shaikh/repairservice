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
        <h4>Company Master</h4>
        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#addcompany">Add Company</button><br>
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
          <table class="table table-bordered" id="viewcompany">
            <thead>
              <tr>
                <th>Sr. No.</th>
                <th>Company Name</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
              <?php $counter = 0; ?>
              @foreach($getcompany as $val)
              <tr>
                <td><?php echo ++$counter; ?></td>
                <td>{{ $val->company_name }}</td>
                <td><button type="button" class="btn btn-info companyedit" id="companyedit" value="{{ $val->company_id }}" data-val="{{ $val->company_name }}">Edit</button></td>
                <td><button type="button" value="{{ $val->company_id }}" class="btn btn-danger del">Delete</button></td>
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


<!-- Modal save company-->
  <div class="modal fade" id="addcompany" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Company</h4>
        </div>
        <div class="modal-body">
          <form action="{{url('add-company')}}" method="post">
            {{ csrf_field() }}
          <label>Add Company</label>
          <input type="text" name="companyname" id="companyname" class="form-control" required="true">
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
  <div class="modal fade" id="updatecompany" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Update Company</h4>
        </div>
        <div class="modal-body">
          <form action="{{url('edit-company')}}" method="post">
            {{ csrf_field() }}
          <label>Change Company</label>
          <input type="hidden" name="comid" id="comid" class="form-control">
          <input type="text" name="comname" id="comname" class="form-control" required="true">
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
        $("#viewcompany tbody tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
   });

   $('.companyedit').click(function(){
      var company_id = $(this).val();
      var company_name = $(this).attr('data-val');
      $('#updatecompany').modal('show');
      $('#comid').val(company_id);
      $('#comname').val(company_name);
   });

   $('.del').click(function(){
      var deldata = confirm('Are you sure you want to delete this item?');
      if(deldata){
        var cid = $(this).val();
        $.ajax({
           url:'del-company/{cid}',
           type:'get',
           data:{ cid:cid },
           success:function(delmsg){
             if(delmsg == 1){
                alert("Company deleted successfully.");
                location.reload();
             }else{
                alert("Company delete failed.");
                location.reload();
             }
           }
        })
      }
   });
  </script>
