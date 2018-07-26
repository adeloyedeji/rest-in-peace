<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $totalBen = \App\Beneficiary::count();
        $totalProjects = \App\Project::count();
        $totalAdmins = \App\User::count();

        $totalStructureBen = $this->structureBens();
        $totalCropProject = $this->cropsProject();
        $totalCropAdmins = $this->cropAdmins();
        $totalStructureAdmins = $this->structureAdmins();
        $totalCompletedProjects = $this->totalCompletedProjects();
        $totalActiveProjects = $this->totalActiveProjects();
        return view('pages.reports.index', [
            'totalBen' =>   $totalBen,
            'totalStructureBen' => $totalStructureBen,
            'totalProjects' =>  $totalProjects,
            'totalCropProjects' =>  $totalCropProject,
            'totalAdmins'   =>  $totalAdmins,
            'totalCropAdmins'   =>  $totalCropAdmins,
            'totalStructureAdmins'  =>  $totalStructureAdmins,
            'totalCompletedProjects'    =>  $totalCompletedProjects,
            'totalActiveProjects'   =>  $totalActiveProjects
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function beneficiaries() {
        return \App\Beneficiary::all();
    }

    public function benIds() {
        return collect($this->beneficiaries())->pluck('id');
    }

    public function structureProps() {
        return \App\SVBenProp::all();
    }

    public function structurePropsIds() {
        return collect($this->structureProps())->pluck('s_v_ben_id');
    }

    public function structureBens() {
        $structureBens = 0;
        $benIdsArray = $this->benIds()->toArray();
        $propsIdArray = $this->structurePropsIds()->toArray();

        foreach($benIdsArray as $b):
            if(in_array($b, $propsIdArray)):
                $structureBens += 1;
            endif;
        endforeach;
        return $structureBens;
    }

    public function cropUsers() {
        return \DB::table('role_user')->where('role_id', 3)->get();
    }

    public function cropUsersId() {
        return collect($this->cropUsers())->pluck('user_id');
    }

    public function structureUsers() {
        return \DB::table('role_user')->where('role_id', 4)->get();
    }

    public function structureUsersId() {
        return collect($this->structureUsers())->pluck('user_id');
    }

    public function projects() {
        return \App\Project::all();
    }

    public function projectIds() {
        return collect($this->projects())->pluck('id');
    }

    public function projectOwnersId() {
        return collect($this->projects())->pluck('created_by');
    }

    public function completedProjects() {
        return \App\ProjectStatus::where('status', 2)->get();
    }

    public function completedProjectsIds() {
        return collect($this->completedProjects())->pluck('project_id');
    }

    public function totalCompletedProjects() {
        return count($this->completedProjectsIds()->toArray());
    }

    public function activeProjects() {
        return \App\ProjectStatus::where('status', 1)->get();
    }

    public function activeProjectsIds() {
        return collect($this->activeProjects())->pluck('project_id');
    }

    public function totalActiveProjects() {
        return count($this->activeProjectsIds()->toArray());
    }

    public function cropsProject() {
        $cropProjects = 0;
        $cUsers = $this->cropUsersId()->toArray();
        $pIds = $this->projectOwnersId()->toArray();

        foreach($cUsers as $u):
            if(in_array($u, $pIds)):
                $cropProjects += 1;
            endif;
        endforeach;
        return $cropProjects;
    }

    public function admins() {
        return \App\User::all();
    }

    public function adminsIds() {
        return collect($this->admins())->pluck('id');
    }

    public function cropAdmins() {
        return count($this->cropUsersId()->toArray());
    }

    public function structureAdmins() {
        return count($this->structureUsersId()->toArray());
    }

    public function states() {
        return \App\State::all();
    }

    public function stateNames() {
        return collect($this->states())->pluck('state');
    }

    public function statesIds() {
        return collect($this->states())->pluck('id');
    }

    public function benStates() {
        $data = []; $temp = [];
        $states = $this->states();

        foreach($states as $state):
            array_push($data, $this->benInState($state->id));
        endforeach;

        return response()->json($data);
    }

    public function benInState($sid) {
        return \App\Beneficiary::where('states_id', $sid)->count();
    }

    public function beneficiariesBySize($year, $size) {
        return \App\beneficiary::where('created_at', 'LIKE', '%' . $year . '%')->where('household_size', $size)->count();
    }

    public function benBySizeData($year) {
        $data = [];
        $sizes = ['1 - 2', '3 - 6', '7 - 14', '15 - 20', 'Over 20'];
        foreach($sizes as $size):
            array_push($data, $this->beneficiariesBySize($year, $size));
        endforeach;
        return response()->json($data);
    }

    public function downloadBeneficiaries() {
        return \Excel::download(new \App\Exports\BeneficiaryExport, 'beneficiaries.xlsx');
    }

    public function downloadProjects() {
        return \Excel::download(new \App\Exports\ProjectExport, 'projects.xlsx');
    }

    public function downloadAdmins() {
        return \Excel::download(new \App\Exports\AdminExport, 'admins.xlsx');
    }

    public function downloadProjectStatus() {
        return \Excel::download(new \App\Exports\ProjectStatusExport, 'projects-status.xlsx');
    }
}
