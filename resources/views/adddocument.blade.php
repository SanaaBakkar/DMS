@extends('layouts.apps')
@section('content')



<div class="container"><br>

<h3 class="well"><img height="50px" src="/img/AddFileIcon.ico">&nbsp;Add a document </h3><hr>

  @if(!empty(Session::get('success')))
          <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                 Your file has been successfully added
          </div>
  @endif

  @if (count($errors) > 0)
          <div class="alert alert-danger">
              <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                     @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                     @endforeach
                </ul>
          </div>
  @endif

<i class="list-group-item">
<form method="post" action="{{url('upload')}}" enctype="multipart/form-data">

  {{csrf_field()}}

  <div class="input-group hdtuto control-group lst increment">

      <input type="file" class="form-control-file" id="fileToUpload" name="fileToUpload" aria-describedby="fileHelp">
      <small id="fileHelp" class="form-text text-muted">Please upload your file. Size of the file should not be more than 2MB.</small><br><br>
     

      <div class="form-group">
        Category: <select class="browser-default custom-select" name="categorie" style="width: 50%" required>
                    <option value=""> Choose a categorie</option>
           @foreach($categories as $category)
                    <option value="{{$category->id}}"> {{$category->name}} </option>
           @endforeach 
                </select>
                <br><br>

            Manage permission:*
            <input type="button" id="select_users" name="id_user" class="btn btn-primary" data-toggle="modal" data-target="#myModal" value="Select" required><br><br>

            <label>Description:</label><br>
            <textarea rows="3" cols="100" name="description" value="description"></textarea>
      </div>
  </div>

  <div class="col-lg-3 col-md-4 ftco-animate fadeInUp ftco-animated">
      <button type="submit" class="btn btn-secondary">Submit</button>

  </div>



<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Users list</h4>
        </div>
        <div class="modal-body">
          <div class="row">
              <div class="col-sm-10">
              <div style="overflow: scroll; height: 290px;">

                <table class="table table-sm" width="80%" border="0" cellspacing="0" cellpadding="0">
                  <thead>
                    <tr class="table-secondary">
                      <th colspan="2"><center>Name</center></th>
                      </tr>
                  </thead>
                            <?php foreach ($Users as $User):?>
                    <tr>
                      <td align="left" class="subtitle_3">{{$User->name}}</td>

                      <td align="right"><input type="checkbox" name="id_user[]" value ="{{$User->id}}"></input></td>
                    </tr>
                            <?php  endforeach; ?>
                </table>  
              </div>
              </div>                
          </div>
        </div>
        <div class="modal-footer">
           <button type="button" class="btn btn-info" id="Save" data-dismiss="modal">Save</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       </div>
    </div>
  </div>
</div>

</form>         
</i>

</div>



<script type="text/javascript">

    $(document).ready(function() {

      $(".btn-primary").click(function(){ 

          var lsthmtl = $(".clone").html();

          $(".increment").after(lsthmtl);

      });

    });

</script>



</html>


@endsection