<?php namespace Bantenprov\Project\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Bantenprov\Project\Facades\Project;
use Bantenprov\Project\Models\Project as ProjectModel;
use Bantenprov\Staf\Models\Staf;
use Validator;
/**
 * The ProjectController class.
 *
 * @package Bantenprov\Project
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class ProjectController extends Controller
{
    protected $projectModel;
    protected $stafModel;
    

    public function __construct()
    {
        $this->projectModel = new ProjectModel();
        $this->stafModel = new Staf();
    }

    public function index()
    {
        $projects = $this->projectModel->paginate(10);
        
        return $projects;
        //return view('project::project.index',compact('projects'));
    }

    public function create()
    {        

        $stafs = $this->stafModel->all();
        
        return $stafs;
        //return view('project::project.create',compact('stafs'));
    }

    public function store($req)
    {
        $validator = Validator::make($req, [
            'staf_id' => 'required',
            'name' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        }

        $store = $req;
        
        array_set($store,'opd_id',$this->stafModel->find($req['staf_id'])->opd_id);              

        $this->projectModel->create($store);

        return redirect()->back()->with('message','Success add data');
    }

    public function show($id)
    {
        
        $project = $this->projectModel->find($id);

        return $project;
    }

    public function edit($id)
    {

        $stafs = $this->stafModel->all();
        $project = $this->projectModel->find($id);
                
        $response = (object) ['project' => $project,'stafs' => $stafs];
        return $response;
    }

    public function update($id, $req)
    {
        $validator = Validator::make($req, [
            'staf_id' => 'required',
            'name' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        }

        $store = $req;
        
        array_set($store,'opd_id',$this->stafModel->find($req['staf_id'])->opd_id);              

        $this->projectModel->find($id)->update($store);

        return redirect()->back()->with('message','Success update data');
    }

    public function destroy($id)
    {
        $this->projectModel->find($id)->delete();
        return redirect()->back();
    }

    public function countProject()
    {
        $result = $this->projectModel->all()->count();

        return $result;
    }
    
    public function demo()
    {
        return Project::welcome();
    }
}
