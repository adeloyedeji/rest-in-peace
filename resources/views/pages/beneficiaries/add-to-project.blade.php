<!-- Modal with icons -->
<div id="addToProject" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <div class="modal-title">Add To Project</div>
            </div>

            <div class="modal-body">
                <form action="{{route('project.add-beneficiary')}}" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="hidden" name="bid" value="{{$beneficiary->id}}">
                    <div class="form-group row">
                        <label class="control-label col-lg-12">Name: {{ $beneficiary->fname . " " . $beneficiary->lname }}</label>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-lg-3">Select Project</label>
                        <div class="col-lg-9">
                            <select data-placeholder="Projects" class="select" id="project" name="project" required>
                                @forelse ($projects as $project)
                                    <option value="{{$project->id}}">{{$project->title}}</option>
                                @empty
                                    <option value="00">No projects found.</option>
                                @endforelse
                            </select>
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit"><i class="icon-checkmark3 position-left"></i> Save</button>
                </form>
            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" data-dismiss="modal"><i class="icon-cross2 position-left"></i> Close</button>
            </div>
        </div>
    </div>
</div>
<!-- /Modal with icons -->