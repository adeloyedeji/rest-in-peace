<fieldset>
    <h3 class="form-wizard-title text-uppercase">
        {{-- <span class="form-wizard-count">4</span> --}}
        {{ session('working_directory') ? 'Currently working on: ' . session('working_directory_name') : 'Set working directory.' }}
        <small class="display-block">Once this is set, all beneficiaries will be automatically added to this project.</small>
    </h3>

    <div class="row">
        <div class="col-md-6 col-sm-6">
            <div class="form-group">
                <label>Existing Projects:</label>
                <select class="select" id="project">
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
            <input class="btn btn-info" id="step4" value="Set as working project." type="button">
        </div>
    </div>
</fieldset>