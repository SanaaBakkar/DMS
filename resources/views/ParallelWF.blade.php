@extends('layouts.apps')
@section('content')
 
<div class="container">
  <div>
    
 
          <div class="form-group">
            <h3><i class="list-group-item"><i class="fas fa-sitemap"></i>&nbsp;&nbsp; Start Workflow</i></h3><hr>
          </div>

             @if(!empty(Session::get('info-phone')))
          <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                  Workflow Started 
          </div>
             @endif

              @if(!empty(Session::get('Error-info')))
          <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                 Please fil out the assignee to field
          </div>
             @endif

        
        <div id="type" style="display: block">
            <label><b>Workflow: </b></label>
            <select name="typeWF" onChange="ShowHide(this.value)" style="width: 35%; display: inline;">
                <option value="Choose">{{ $actual_wf->name }}</option>
                              <?php foreach ($wftypes as $wftype): ?>
                <option value="{{$wftype->id}}">{{$wftype->name}}</option>
                              <?php endforeach; ?>
            </select>
       </div>

  <form method="post" action="{{ url('/workflowParallel',array($documents->id)) }}">
            {{csrf_field()}}

            <!-- Modal of button Select of a single Assignee -->           
   <div class="container">
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
                            <?php foreach ($listUsers as $listUser):?>
                    <tr>
                      <td align="left" class="subtitle_3">{{$listUser->name}}</td>

                      <td align="right"><input type="checkbox" name="id_user[]" value ="{{$listUser->id}}" ></input></td>
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
</div>
<!--- End Modal --->  
      <!-- Parallel Review & Approve-->  
       
  <div id="3" class="form-group" style="display: block; border-style: groove; padding-bottom: 10px">
          
       <i class="list-group-item">              
       <label><b>Parallel Review & Approve</b></label><br>
       <input type="text" name="type_Workflow" value="3" hidden>
        Description:<br>
       <textarea style="width: 80%; height: 20%" name="description" required></textarea><br><br>

       <div class="row">
          <div class="col">
              <label for="start"><i style="font-size:24px" class="fa">&#xf073;&nbsp;</i>Due:</label>
              <input type="date"  id="due" name="Date" placeholder="MM-DD-YY" min="<?php echo date('Y-m-d') ?>" style="width: 35%" required>
           </div>
           <div class="col">
		        Priority:
		        <select name="priority" style="width: 30%">
		              <option value="low">Low</option>
		              <option value="medium">Medium</option>
		              <option value="high">High</option>
		        </select>
            </div>                    
         </div>    <br>       

        <b>Assignee</b><hr>
        Assign to:* 
        <input type="button" id="select_users" name="id_user" class="btn btn-info" data-toggle="modal" data-target="#myModal" value="Select" required><br><br>
        
        <b>Document</b>
        <div id="doc" style="display: block;">
           <i class="list-group-item">
           <table name="doc_info">
              <tr>
           		 <td width="20%"><img height="50px" src="/img/fileicon.png" /></td>
            	 <td width="60%">
            	 	  {{$documents->doc_name}} <br>
		              Description : {{ $documents->doc_description }}<br>
		              Modified on : {{ $documents->updated_at}}</td>
              </tr>
           </table>
           </i>
        </div><br>

  
        <b>Other Options:</b>
        <input type="checkbox" name="email">Send email
      </i><br>


      <input type="submit" class="btn btn-info" id="start_wf" name="startwf" value="Start Workflow">
      <input type="reset" class="btn btn-danger" name="cancel" value="Cancel">
          </div>
                 

      <!-- End -->   

    
     </form>  

  </div> 
</div>


<script type="text/javascript">

/***** Display each type of workflow *****/
 function ShowHide(val) {

     var typewf3 = document.getElementById("3");
     var url = "";

    if (val == '1') {
     window.location.href = '{{url("workflow/{$documents->id}")}}';

    }else if (val == '2') {
      window.location.href = '{{url("workflowGroup/{$documents->id}")}}';
    
    }else if (val == '3') {
      typewf3.style.display = 'block';
      
    } else if (val=='4'){
     window.location.href = '{{url("workflowPooled/{$documents->id}")}}';
    }
  }


</script>


@endsection






