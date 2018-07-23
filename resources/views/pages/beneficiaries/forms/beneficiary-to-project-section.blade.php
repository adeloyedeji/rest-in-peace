<fieldset>
    <h3 class="form-wizard-title text-uppercase">
        <span class="form-wizard-count">4</span>
        Add Beneficiary to a Project
        <small class="display-block">Project Merging.</small>
    </h3>

    <div class="row">
        <div class="col-md-6 col-sm-6">
            <div class="form-group">
                <label>Existing Projects:</label>
                <select class="form-control" id="project">
                    @forelse($projects as $project)
                    <option value="{{$project->id}}">{{$project->title}} - <small>{{$project->code}}</small></option>
                    @empty
                    <option value="0">No projects found</option>
                    @endforelse
                </select>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-6">
            <br>
            <input class="btn btn-info" id="step4" value="Assign to project" type="button">
        </div>
    </div>
</fieldset>