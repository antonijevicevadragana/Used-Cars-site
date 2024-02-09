<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\User;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $dataCar = Car::latest()->paginate(4);
        return view('car.index', ['dataCar' => $dataCar]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('car.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validacija podataka
  
//   $userId=$request->input('user_id');
$user=Auth::user();
        $form = $request->validate([
            'brend' => 'required|alpha',
            'model' => 'required|regex:/^[A-Za-z0-9\s\-\/]+$/', //Ovaj izraz ^[A-Za-z0-9\s\-\/]+$ će dozvoliti samo slova, brojeve, razmake, '-', i '/'
            'mileage' => 'required|regex:/^[A-Za-z0-9]+$/', //dozvoljava unos brojeva i slova..npr da se unese 10000km
            'engineDisplacement' => 'required|numeric', //dozvoljava unos brojeva kao i unos decimalnih brojeva
            'AvgFuelConsumption' => 'required|numeric',
            'year' => 'required',
            'city' => 'required',
            'category' => 'in:limousine,pickup,hatchback,station Wagon,convertible/cabriolet,coupe,minivan,jeep',
            'fuel' => 'in:gasoline,diesel,gas,gasoline+gas,hybrid',
            'transmission' => 'in:automatic,manuel',
            'NumberOfDoors' => 'required|regex:/^[A-Za-z0-9\/]+$/', //dozvoljava unos brojeva i / exp. 4/5
            'NumberOfSeats' => 'required|numeric',
            'airCondition' => 'required|regex:/^[a-zA-Z\/\-]+$/',
            'color' => 'required|alpha',
            'registration' => 'required|regex:/^[a-zA-Z0-9\s\.\-]*$/',
            'demage' => 'required|regex:/^[A-Za-z0-9\s\-\/]+$/',
            'fixPrice' => 'in:yes,no',
            'price' => 'required|numeric',
            'descript' => 'required|regex:/^[A-Za-z0-9\s\-\/]+$/',
            'cover_img' => 'image|between:1,3072|max:3072',
            'img.*' => 'image|between:1,3072|max:3072',
        ]);
          
      
        $form['user_id'] = $user->id;
        //upis u tabelu cars
        // dd($form);

        $car = Car::create([
            'brend' => $form['brend'],
            'model' => $form['model'],
            'mileage' => $form['mileage'],
            'engineDisplacement' => $form['engineDisplacement'],
            'category' => $form['category'],
            'fuel' => $form['fuel'],
            'transmission' => $form['transmission'],
            'NumberOfDoors' => $form['NumberOfDoors'],
            'NumberOfSeats' => $form['NumberOfSeats'],
            'airCondition' => $form['airCondition'],
            'color' => $form['color'],
            'registration' => $form['registration'],
            'demage' => $form['demage'],
            'fixPrice' => $form['fixPrice'],
            'price' => $form['price'],
            'descript' => $form['descript'],
            'user_id' => $form['user_id'],
            'AvgFuelConsumption' => $form['AvgFuelConsumption'],
            'year' => $form['year'],
            'city' => $form['city'],
            'cover_img' => $form['cover_img']

        ]);
        //cuvanje cover image
        // if ($request->hasFile('cover_img')) {
        //     $formFilds['cover_img'] = $request->file('cover_img')->store('CoverImage', 'public'); 
        // }
        if ($request->hasFile('cover_img') && $request->file('cover_img')->isValid()) {
            //generisemo naziv slike id filma i ekstenzija fajla
            $imgName = $car->id . '.' . $request->file('cover_img')->extension();
            //smestamo fajl u folder public/film_images
            Storage::disk('public')
                ->putFileAs('CoverImage', $request->file('cover_img'), $imgName);

            //u bazi belezimo putanju od public foldera
            $car->cover_img = 'CoverImage/' . $imgName;
            $car->save();

            //cuvanje slika 
            if ($request->hasFile('img')) {
                foreach ($request->file('img') as $image) {
                    $path = $image->store('cars', 'public');
                    Image::create([
                        'path' => $path,
                        'car_id' => $car->id, // Povežite sliku sa blog postom
                    ]);
                }
            }

            session()->flash('alertType', 'success');
            session()->flash('alertMsg', 'Ad successfully created!');

            return redirect()->route('car.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        
        $carId = $car->id;
        $images=Image::where('car_id', $carId)->get();

    //      // Retrieve all users whose id is in the user_id column of the cars table
    // $users = User::whereIn('id', function($query) use ($carId) {
    //     $query->select('user_id')
    //         ->from('cars')
    //         ->where('id', $carId);
    // })->get();

    // // Since it seems you are trying to get the seller, you may want to use first() instead of get()
    // $seller = $users->first();

    $seller = User::where('id', $car->user_id)->first();

        return view('car.show', compact('car', 'images', 'seller'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        //
        //
        $carId = $car->id;
        $images = Image::where('car_id', $carId)->get();
        return view('car.edit', ['car' => $car, 'images' => $images]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Car $car)
    {
        //
        //validacija podataka

        $form = $request->validate([
            'brend' => 'required|alpha',
            'model' => 'required|regex:/^[A-Za-z0-9\s\-\/]+$/', //Ovaj izraz ^[A-Za-z0-9\s\-\/]+$ će dozvoliti samo slova, brojeve, razmake, '-', i '/'
            'mileage' => 'required|regex:/^[A-Za-z0-9]+$/', //dozvoljava unos brojeva i slova..npr da se unese 10000km
            'engineDisplacement' => 'required|numeric', //dozvoljava unos brojeva kao i unos decimalnih brojeva
            'AvgFuelConsumption' => 'required|numeric',
            'year' => 'required',
            'city' => 'required',
            'category' => 'in:limousine,pickup,hatchback,station Wagon,convertible/cabriolet,coupe,minivan,jeep',
            'fuel' => 'in:gasoline,diesel,gas,gasoline+gas,hybrid',
            'transmission' => 'in:automatic,manuel',
            'NumberOfDoors' => 'required|regex:/^[A-Za-z0-9\/]+$/', //dozvoljava unos brojeva i / exp. 4/5
            'NumberOfSeats' => 'required|numeric',
            'airCondition' => 'required|regex:/^[a-zA-Z\/\-]+$/',
            'color' => 'required|alpha',
            'registration' => 'required|regex:/^[a-zA-Z0-9\s\.\-]*$/',
            'demage' => 'required|regex:/^[A-Za-z0-9\s\-\/]+$/',
            'fixPrice' => 'in:yes,no',
            'price' => 'required|numeric',
            'descript' => 'required|regex:/^[A-Za-z0-9\s\-\/]+$/',
            'cover_img' => 'image|between:1,3072|max:3072',
            'img.*' => 'image|between:1,3072|max:3072',
        ]);
// dd($form);
       
$car->update($request->only('brend', 'model', 'mileage', 'engineDisplacement', 'category', 'fuel', 'transmission', 'NumberOfDoors', 'NumberOfSeats', 'airCondition', 'color', 'registration', 'demage', 'fixPrice', 'price', 'descript', 'AvgFuelConsumption', 'year', 'city', 'cover_img'));
        
if ($request->hasFile('cover_img') && $request->file('cover_img')->isValid()) {
            //generisemo naziv slike id filma i ekstenzija fajla
            $imgName = $car->id . '.' . $request->file('cover_img')->extension();
            //smestamo fajl u folder public/film_images
            Storage::disk('public')
                ->putFileAs('CoverImage', $request->file('cover_img'), $imgName);

            //u bazi belezimo putanju od public foldera
            $car->cover_img = 'CoverImage/' . $imgName;
            $car->save();

          

            if ($request->has('keep_old_images')) {
                // Ako je korisnik označio opciju "Zadrži stare slike", nema potrebe za brisanjem starih slika.
                if ($request->hasFile('img')) {
                    foreach ($request->file('img') as $image) {
                        $path = $image->store('cars', 'public');
                        Image::create([
                            'path' => $path,
                            'car_id' => $car->id, // Povežite sliku sa blog postom
                        ]);
                    }
                }
            } else {
                // Ako korisnik nije označio opciju "Zadrži stare slike", obrišite sve stare slike.
                $car->images()->delete();
                if ($request->hasFile('img')) {
                    foreach ($request->file('img') as $image) {
                        $path = $image->store('cars', 'public');
                        Image::create([
                            'path' => $path,
                            'car_id' => $car->id, // Povežite sliku sa blog postom
                        ]);
                    }
                }
            }
        }

        session()->flash('alertType', 'success');
        session()->flash('alertMsg', 'Edit successfully!');

        return redirect()->route('car.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        $car->delete();
        session()->flash('alertType', 'success');
        session()->flash('alertMsg', 'Deleted successfully!');
        return redirect()->route('car.index');
    }


    public function menage() {
        $user=Auth::user();
        $userId=$user->id;
        $myCars=Car::where('user_id', $userId)->get();

        return view('car.menage', compact('myCars'));
      
    }
}
