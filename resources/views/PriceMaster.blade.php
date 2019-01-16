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
        <h4>Price Master</h4>
        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#addprice">Add Price</button><br>
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
          <table class="table table-bordered" id="viewprice">
            <thead>
              <tr>
                <th>Sr. No.</th>
                <th>Company Name</th>
                <th>Model Name</th>
                <th>Issue</th>
                <th>Price</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
              <?php $counter = 0; ?>
              @foreach($getprice as $val)
              <tr>
                <td><?php echo ++$counter; ?></td>
                <td>{{ $val->company_name }}</td>
                <td>{{ $val->modal_name }}</td>
                <td>{{ $val->issue_name }}</td>
                <td>{{ $val->price }}</td>
                <td><button type="button" class="btn btn-info updateprice" id="updateprice" value="{{ $val->p_id }}">Edit</button></td>
                <td><button type="button" value="{{ $val->p_id }}" class="btn btn-danger del">Delete</button></td>
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
        $("#viewprice tbody tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
   });

  $('.updateprice').click(function(){
        var priceid = $(this).val();
        $.ajax({
           url:'view-update-price/{priceid}',
           type:'get',
           data:{ priceid:priceid },
           success:function(updatemsg){
            $('#updatepricemodal').modal('show');
            $('#upid').val(updatemsg[0].p_id);
            $('#ucomid').append( '<option value="'+ updatemsg[0].company_id +'" selected>'+updatemsg[0].company_name+'</option>' );
            $('#umid').append( '<option value="'+ updatemsg[0].model_id +'" selected>'+updatemsg[0].modal_name+'</option>' );
            $('#uissid').append( '<option value="'+ updatemsg[0].issue_id +'" selected>'+updatemsg[0].issue_name+'</option>' );
            $('#uprice').val(updatemsg[0].price);
           }
        })
   });

    $('.del').click(function(){
      var deldata = confirm('Are you sure you want to delete this item?');
      if(deldata){
        var prid = $(this).val();
        $.ajax({
           url:'del-price/{prid}',
           type:'get',
           data:{ prid:prid },
           success:function(delmsg){
             if(delmsg == 1){
                alert("Price deleted successfully.");
                location.reload();
             }else{
                alert("Price delete failed.");
                location.reload();
             }
           }
        })
      }
   });
</script>
</body>
</html>

<!-- Modal save price-->
  <div class="modal fade" id="addprice" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Price</h4>
        </div>
        <div class="modal-body">
          <form action="{{url('add-price')}}" method="post">
            {{ csrf_field() }}

          <label>Select Company</label>
          <select type="text" name="comid" id="comid" class="form-control comid" required="true">
          	<option selected disabled="" value="">----Select----</option>
          	@foreach($getcompany as $val)
          		<option value="{{ $val->company_id }}">{{ $val->company_name }}</option>
          	@endforeach
          </select>
          <br>

          <label>Select Model</label>
          <select type="text" name="mid" id="mid" class="form-control" required="true">
          	<option selected disabled="" value="">----Select----</option>
          </select>
          <br>

           <label>Select Issue</label>
          <select type="text" name="issid" id="issid" class="form-control" required="true">
          	<option selected disabled="" value="">----Select----</option>
          	@foreach($getissue as $val)
          		<option value="{{ $val->issue_id }}">{{ $val->issue_name }}</option>
          	@endforeach
          </select>
          <br>

          <label>Add price</label>
          <input type="text" name="aprice" id="aprice" class="form-control" required="true">
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Submit</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Modal update price-->
  <div class="modal fade" id="updatepricemodal" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Update Price</h4>
        </div>
        <div class="modal-body">
          <form action="{{url('update-save-price')}}" method="post">
            {{ csrf_field() }}
          <input type="hidden" name="upid" id="upid" value="">
          <label>Select Company</label>
          <select type="text" name="ucomid" id="ucomid" class="form-control ucomid" required="true">
            <option selected disabled="" value="">----Select----</option>
            @foreach($getcompany as $val)
              <option value="{{ $val->company_id }}">{{ $val->company_name }}</option>
            @endforeach
          </select>
          <br>

          <label>Select Model</label>
          <select type="text" name="umid" id="umid" class="form-control" required="true">
            <option selected disabled="" value="">----Select----</option>
          </select>
          <br>

           <label>Select Issue</label>
          <select type="text" name="uissid" id="uissid" class="form-control" required="true">
            <option selected disabled="" value="">----Select----</option>
            @foreach($getissue as $val)
              <option value="{{ $val->issue_id }}">{{ $val->issue_name }}</option>
            @endforeach
          </select>
          <br>

          <label>Change price</label>
          <input type="text" name="uprice" id="uprice" class="form-control" required="true">
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
    $('.comid').change(function(){
          var companyid = $(this).val();
          $('#mid').empty();
          $.ajax({
            url:'get-model-depend-company/{companyid}',
            type:'get',
            data:{ companyid:companyid },
            success:function(resdata){
              $.each(resdata, function(index) {
              $('#mid').append('<option value="'+resdata[index].model_id+'">'+resdata[index].modal_name+'</option>');
              });
            }
          })
      });

    $('.ucomid').change(function(){
          var companyid = $(this).val();
          $('#umid').empty();
          $.ajax({
            url:'get-model-depend-company/{companyid}',
            type:'get',
            data:{ companyid:companyid },
            success:function(resdata){
              $.each(resdata, function(index) {
              $('#umid').append('<option value="'+resdata[index].model_id+'">'+resdata[index].modal_name+'</option>');
              });
            }
          })
      });
  </script>

