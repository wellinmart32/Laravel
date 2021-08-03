<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pet;
use App\Specie;
use App\Permission;
class PetController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user_id = auth()->user()->id;
        
        $view = Permission::where('user_id', $user_id)->first()->view;
        
        if($view)
        {
            $pets = Pet::all();
            $species = Specie::all();

            return view('pet.list', compact('pets', 'species'));
        }
        else
            return "El usuario no tiene permiso para ver.";
        
    }

    public function create()
    {
        $user_id = auth()->user()->id;
        
        $create = Permission::where('user_id', $user_id)->first()->create;
        $species = Specie::all();
        
        if($create)
            return view('pet.create', compact('species'));
        else
            return "El usuario no tiene permiso para crear.";
    }

    public function store(Request $request)
    {
        $pet = new Pet();
        $pet->name = $request->name;
        $pet->sex = $request->sex;
        $pet->age = $request->age;
        $pet->specie_id = $request->specie_id;
        $pet->save();

        return back()->with('mensaje', 'Mascota creada correctamente.');
    }

    public function show($id)
    {
        $user_id = auth()->user()->id;
        
        $delete = Permission::where('user_id', $user_id)->first()->delete;
        $species = Specie::all();

        if($delete)
        {
            $pet = Pet::findOrFail($id);

            return view('pet.delete', compact('pet', 'species'));
        }
        else
            return "El usuario no tiene permiso para eliminar.";
    }

    public function edit($id)
    {
        $user_id = auth()->user()->id;
        
        $edit = Permission::where('user_id', $user_id)->first()->edit;
        
        if($edit)
        {
            $pet = Pet::findOrFail($id);
            $species = Specie::all();
            
            return view('pet.edit', compact('pet', 'species'));
        }
        else
            return "El usuario no tiene permiso para actualizar.";
    }

    public function update(Request $request, $id)
    {
        $pet = Pet::findOrFail($id);
        $pet->name = $request->name;
        $pet->sex = $request->sex;
        $pet->age = $request->age;
        $pet->specie_id = $request->specie_id;
        $pet->save();
        
        return back()->with('mensaje', 'Mascota actualizada correctamente.');
    }

    public function destroy($id)
    {
        $pet = Pet::findOrFail($id);
        $pet->delete();

        return redirect()->route('pets-list')->with('mensaje', 'Mascota eliminada correctamente.');
    }

    public function filter()
    {
        return view('pet.filter');
    }

    public function search(Request $request)
    {
        $pets = Pet::whereBetween('created_at', [$request->st_dt, $request->fn_dt])->get();
        $sum = 0;

        foreach ($pets as $item)
            $sum = $sum + 1;

        return view('pet.search', compact('pets', 'sum'));
    }

    public function dogGraph()
    {
        $graph_data = '{
            type: "bar",
            data: {
                labels: [12, 19, 3, 5, 2, 3],
                datasets: [{
                    label: "# of Votes",
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        "rgba(255, 99, 132, 0.2)",
                        "rgba(54, 162, 235, 0.2)",
                        "rgba(255, 206, 86, 0.2)",
                        "rgba(75, 192, 192, 0.2)",
                        "rgba(153, 102, 255, 0.2)",
                        "rgba(255, 159, 64, 0.2)"
                    ],
                    borderColor: [
                        "rgba(255, 99, 132, 1)",
                        "rgba(54, 162, 235, 1)",
                        "rgba(255, 206, 86, 1)",
                        "rgba(75, 192, 192, 1)",
                        "rgba(153, 102, 255, 1)",
                        "rgba(255, 159, 64, 1)"
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        }';

        $data = json_encode($graph_data, true);

        // return $data->type;
        
        return view('pet.dog-graph', compact('graph_data'));
    }

    public function catGraph()
    {
        return view('pet.cat-graph');
    }

    public function canaryGraph()
    {
        return view('pet.canary-graph');
    }

    public function hamsterGraph()
    {
        return view('pet.hamster-graph');
    }

    public function petsGraph()
    {
        return view('pet.pets-graph');
    }

    public function graphsMenu()
    {
        $species = Specie::all();

        return view('pet.graphs-menu', compact('species'));
    }
}
