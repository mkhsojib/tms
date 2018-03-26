<!-- File Upload Modal start -->
<div class="modal fade" id="fileModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Upload your xlsx / xls:</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.file.upload') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}



                    <div class="form-group row">
                        <label for="weak_id" class="control-label col-sm-3">File:</label>
                        <div class="col-sm-9">
                            <input type="file" name="file" class="form-control" placeholder='Choose a file...'>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="team_member_id" class="control-label col-sm-3">Select a member:</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="team_member_id">
                                <option value="" id="team_member_id">Select a member</option>

                                @foreach($users as $member)
                                    @if($member->name!="Admin")
                                        <option value="{{$member->id}}">{{$member->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="week_name" class="control-label col-sm-3">Week/Day Name:</label>
                        <div class="col-sm-9">
                            <input type="text" name="week_name" class="form-control" placeholder='enter name '>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane-o" aria-hidden="true"></i> Submit</button>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times-circle" aria-hidden="true"></i> Close</button>
            </div>

        </div>

    </div>
</div>
<!-- File Upload Modal ends -->