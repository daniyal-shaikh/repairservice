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
        <h4>User Search Master</h4>
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
                <th>Customer Name</th>
                <th>Mobile No.</th>
                <th>Email ID</th>
                <th>Address</th>
                <th>Company</th>
                <th>Model</th>
                <th>Issue</th>
                <th>Price</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
              <?php $counter = 0; ?>
              @foreach($getuserdetails as $val)
              <tr>
                <td><?php echo ++$counter; ?></td>
                <td>{{ $val->fullname }}</td>
                <td>{{ $val->phoneno }}</td>
                <td>{{ $val->emailid }}</td>
                <td>{{ $val->address }}</td>
                <td>{{ $val->company_name }}</td>
                <td>{{ $val->modal_name }}</td>
                <td>{{ $val->issue_name }}</td>
                <td>{{ $val->price }}</td>
                <td><button type="button" value="{{ $val->u_search_id }}" class="btn btn-danger del">Delete</button></td>
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

    $('.del').click(function(){
      var deldata = confirm('Are you sure you want to delete this Record?');
      if(deldata){
        var uid = $(this).val();
        $.ajax({
           url:'del-history/{uid}',
           type:'get',
           data:{ uid:uid },
           success:function(delmsg){
             if(delmsg == 1){
                alert("Record deleted successfully.");
                location.reload();
             }else{
                alert("Record delete failed.");
                location.reload();
             }
           }
        })
      }
   });
</script>
</body>
</html>